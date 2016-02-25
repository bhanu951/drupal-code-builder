<?php

/**
 * @file
 * Contains DrupalCodeBuilder\Environment\DrupalLibrary.
 */

namespace DrupalCodeBuilder\Environment;

/**
 * Environment class for use as a library, without Libraries API.
 */
class DrupalLibrary extends BaseEnvironment {

  /**
   * Output debug data.
   */
  function debug($data, $message = '') {
    if (function_exists('dpm')) {
      dpm($data, $message);
    }
  }

}
