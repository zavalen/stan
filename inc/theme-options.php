<?php
class StanOptions
{
    private $languages;
    private $option_group;
    private $page;
    private $sections;
    private $fields;

    public function __construct()
    {
        $this->languages = pll_languages_list();
        $this->option_group = 'theme-options-settings';
        $this->page = 'theme-options';

        $this->sections = array(
            'common' => __('Common', 'stan')
        );

        $this->fields = array(
            // 'logo_text' => array(
            //     'title' => __('Logo text', 'stan'),
            //     'callback' => array($this, 'textareaMultilang'),
            //     'section' => 'common',
            //     'multilang' => true
            // ),
            'headbar_text' => array(
                'title' => __('Header addres', 'stan'),
                'callback' => array($this, 'textareaMultilang'),
                'section' => 'common',
                'multilang' => true,
            ),
            
            'organization_name' => array(
                'title' => __('Organization name', 'stan'),
                'callback' => array($this, 'textareaMultilang'),
                'section' => 'common',
                'multilang' => true,
            ),
            'organization_short_description' => array(
                'title' => __('Organization short description', 'stan'),
                'callback' => array($this, 'textareaMultilang'),
                'section' => 'common',
                'multilang' => true,
            ),
            'organization_full_description' => array(
                'title' => __('Organization full description', 'stan'),
                'callback' => array($this, 'textareaMultilang'),
                'section' => 'common',
                'multilang' => true,
            ),

            'footer_text' => array(
                'title' => __('Footer text', 'stan'),
                'callback' => array($this, 'textareaMultilang'),
                'section' => 'common',
                'multilang' => true
            ),
            'no_announcements' => array(
                'title' => __('No announcements text', 'stan'),
                'callback' => array($this, 'textareaMultilang'),
                'section' => 'common',
                'multilang' => true
            ),
            'scripts' => array(
                'title' => __('Scripts', 'stan'),
                'callback' => array($this, 'textareaLarge'),
                'section' => 'common'
            )
        );

        //

        add_action('admin_menu', function () {
            add_menu_page(__('Theme Options', 'stan'), __('Theme Options', 'stan'), 'manage_options', 'theme_options', array($this, 'optionsPage'));
        });

        add_action('admin_init', function () {
            foreach ($this->sections as $id => $title) {
                add_settings_section($id, $title, null, $this->page);
            }

            foreach ($this->fields as $id => $field) {
                if ($field['multilang']) {
                    foreach ($this->languages as $language) {
                        register_setting($this->option_group, $id . '_' . $language);
                    }
                } else {
                    register_setting($this->option_group, $id);
                }

                add_settings_field($id, $field['title'], $field['callback'], $this->page, $field['section'], $id);
            }
        });
    }

    public function optionsPage()
    { ?>
        <div class="wrap">
            <h1><?php _e('Theme Options', 'stan'); ?></h1>

            <form method="post" action="options.php">
                <?php
                settings_fields($this->option_group);

                do_settings_sections($this->page);

                submit_button();
                ?>
            </form>
        </div>
    <?php }

    public function inputText($option)
    { ?>
        <input type="text" id="<?php echo $option; ?>" class="regular-text" name="<?php echo $option; ?>" value="<?php echo get_option($option); ?>">
        <?php }

    public function textareaMultilang($option)
    {
        foreach ($this->languages as $language) { ?>
            <?php $option_lang = $option . '_' . $language; ?>

            <p style="width: 45%;margin-right:10px;display: inline-block;">
                <strong><?php echo $language; ?></strong>

                <textarea id="<?php echo $option_lang; ?>" style="height: 50px;" class="large-text" name="<?php echo $option_lang; ?>" rows="5"><?php echo get_option($option_lang); ?></textarea>
            </p>
        <?php }
    }

    public function textareaLarge($option)
    { ?>
        <textarea id="<?php echo $option; ?>" class="large-text" name="<?php echo $option; ?>" rows="20"><?php echo get_option($option); ?></textarea>
<?php }
}

new StanOptions();
