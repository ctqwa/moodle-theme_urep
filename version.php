<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This is built using the Clean template to allow for new theme's using
 * Moodle's new Bootstrap theme engine
 *
 *
 * @package   theme_urep
 * @author    Evgeniy Yuzhakov
 * @author    Based on code originally written by Julian (@moodleman) Ridden G J Bernard, Mary Evans, Bas Brands, Stuart Lamour and David Scotson.
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$plugin->version   = 20140521;        // YYYYMMDD.
$plugin->maturity = MATURITY_STABLE;             // this version's maturity level.
$plugin->release = '0.9 (Build: 20140521)';
$plugin->requires  = 20140521051200;        // Requires Moodle 2.7.
$plugin->component = 'theme_urep';
$plugin->dependencies = array(
    'theme_bootstrapbase'  => 2014051200,
);