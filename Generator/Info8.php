<?php

/**
 * @file
 * Contains ModuleBuilder\Generator\Info8.
 */

namespace ModuleBuilder\Generator;

/**
 * Generator class for module info file for Drupal 8.
 */
class Info8 extends Info {

  /**
   * Build the code files.
   */
  function collectFiles(&$files) {
    parent::collectFiles($files);

    $files['info']['filename'] = $this->base_component->component_data['root_name'] . '.info.yml';
  }

  /**
   * Create lines of file body for Drupal 8.
   */
  function file_body() {
    $args = func_get_args();
    $files = array_shift($args);

    $module_data = $this->base_component->component_data;
    print_r($module_data);

    $lines = array();
    $lines['name'] = $module_data['readable_name'];
    $lines['type'] = $module_data['base'];
    $lines['description'] = $module_data['short_description'];
    if (!empty($module_data['module_dependencies'])) {
      // For lines which form a set with the same key and array markers,
      // simply make an array.
      foreach (explode(' ', $module_data['module_dependencies']) as $dependency) {
        $lines['dependencies'][] = $dependency;
      }
    }

    if (!empty($module_data['module_package'])) {
      $lines['package'] = $module_data['module_package'];
    }

    $lines['core'] = "8.x";

    // Files containing classes need to be declared in the .info file.
    foreach ($files as $file) {
      if (!empty($file['contains_classes'])) {
        $lines['files'][] = $file['filename'];
      }
    }

    $info = $this->process_info_lines($lines);
    return $info;
  }

  /**
   * Process a structured array of info files lines to a flat array for merging.
   *
   * @param $lines
   *  An array of lines keyed by label.
   *  Place grouped labels (eg, dependencies) into an array of
   *  their own, keyed numerically.
   *  Eg:
   *    name => module name
   *    dependencies => array(foo, bar)
   *
   * @return
   *  An array of lines for the .info file.
   */
  function process_info_lines($lines) {
    $yaml_parser = new \Symfony\Component\Yaml\Yaml;
    $yaml = $yaml_parser->dump($lines, 2, 2);
    //drush_print_r($yaml);

    // Because the yaml is all built for us, this is just a singleton array.
    return array($yaml);
  }

}
