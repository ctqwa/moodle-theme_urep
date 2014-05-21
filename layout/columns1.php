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
 * The Essential theme is built upon the Bootstrapbase theme.
 *
 * @package    theme
 * @subpackage Urep
 * @author     Evgeniy Yuzhakov
 * @author     Based on code originally written by Julian (@moodleman) Ridden G J Bernard, Mary Evans, Bas Brands, Stuart Lamour and David Scotson.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$haslogo = (!empty($PAGE->theme->settings->logo));
$hasboringlayout = (empty($PAGE->theme->settings->layout)) ? false : $PAGE->theme->settings->layout;
$hasanalytics = (empty($PAGE->theme->settings->useanalytics)) ? false : $PAGE->theme->settings->useanalytics;

theme_urep_check_colours_switch();
theme_urep_initialise_colourswitcher($PAGE);

$bodyclasses = array();
$bodyclasses[] = 'urep-colours-' . theme_urep_get_colours();
 
echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- iOS Homescreen Icons -->
    <?php require_once(dirname(__FILE__).'/includes/iosicons.php'); ?>
</head>

<body <?php echo $OUTPUT->body_attributes($bodyclasses); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php require_once(dirname(__FILE__).'/includes/header.php'); ?>

<header role="banner" class="navbar">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" href="<?php echo $CFG->wwwroot;?>"><?php echo $SITE->shortname; ?></a>
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse mainnav">
                <?php echo $OUTPUT->custom_menu(); ?>
               <ul class="nav pull-right">
                    <li class="navbar-text"><?php if (!isloggedin() || isguestuser()) {
                        echo $OUTPUT->login_info();
                        echo '<style>.mainnav .nav {width:auto}</style>'; 
                    } ?></li>
                </ul>

            </div>
        </div>
    </nav>

    <?php require_once(dirname(__FILE__).'/includes/page-navbar.php'); ?>

</header>

<div id="page" class="container-fluid">
	<!-- Start Main Regions -->
    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span12">

            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
    </div>
	<!-- End Main Regions -->

</div>


<footer id="page-footer">
    <div class="container-fluid">
        <?php require_once(dirname(__FILE__).'/includes/footer.php'); ?>
    </div>
</footer>

<?php echo $OUTPUT->standard_end_of_body_html() ?>


<!-- Start Google Analytics -->
<?php if ($hasanalytics) { ?>
	<?php require_once(dirname(__FILE__).'/includes/analytics.php'); ?>
<?php } ?>
<!-- End Google Analytics -->

<script type="text/javascript">
jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
</script>
<a href="#top" class="back-to-top" title="<?php print_string('backtotop', 'theme_urep'); ?>"><i class="fa fa-angle-up "></i></a>
</body>
</html>
