<?php

namespace DrupalCodeBuilder\File;

use Symfony\Component\Yaml\Yaml;

/**
 * Represents a Drupal extension's files in the codebase.
 */
class DrupalExtension {

  /**
   * The extension type, e.g. 'module'.
   *
   * @var string
   */
  protected $type;

  /**
   * The extension name.
   *
   * @var string
   */
  protected $name;

  /**
   * The given extension path.
   *
   * @var string
   */
  protected $path;

  /**
   * Constructs a new extension.
   *
   * @param string $extension_type
   *   The type.
   * @param string $extension_path
   *   The path.
   */
  public function __construct(string $extension_type, string $extension_path) {
    if (!file_exists($extension_path)) {
      throw new \Exception("Path $extension_path does not exist.");
    }

    $this->path = $extension_path;
    $this->type = $extension_type;
    $this->name = basename($this->path);
  }

  /**
   * Determines whether a file exists in the extension.
   *
   * @param string $relative_file_path
   *   The filepath relative to the extension folder. Use '%module' to represent
   *   the extension's machine name in the filepath.
   *
   * @return bool
   *   TRUE if the file exists, FALSE if not.
   */
  public function hasFile(string $relative_file_path): bool {
    return file_exists($this->getRealPath($relative_file_path));
  }

  /**
   * Gets the YAML data from a file,
   *
   * @param string $relative_file_path
   *   The filepath relative to the extension folder. Use '%module' to represent
   *   the extension's machine name in the filepath.
   *
   * @return array
   *   The YAML data.
   */
  public function getFileYaml(string $relative_file_path): array {
    // TODO: throw if not a .yml file.

    $yml = $this->getFileContents($relative_file_path);

    $value = Yaml::parse($yml);

    return $value;
  }

  /**
   * Gets the absolute path from a relative path.
   *
   * This does not check the file exists.
   *
   * @param string $relative_file_path
   *   The filepath relative to the extension folder. Use '%module' to represent
   *   the extension's machine name in the filepath.
   *
   * @return string
   *   The absolute filepath, with the '%module' wildcard replaced.
   */
  protected function getRealPath(string $relative_file_path): string {
    $relative_file_path = str_replace('%module', $this->name, $relative_file_path);
    $absolute_file_path = $this->path . '/' . $relative_file_path;
    return $absolute_file_path;
  }

  /**
   * Gets the contents of a file.
   *
   * @param string $relative_file_path
   *   The filepath relative to the extension folder. Use '%module' to represent
   *   the extension's machine name in the filepath.
   *
   * @return string
   *   The file contents.
   */
  protected function getFileContents($relative_file_path) {
    return file_get_contents($this->getRealPath($relative_file_path));
  }

}
