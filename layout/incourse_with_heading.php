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
$sideregionsmaxwidth = (!empty($PAGE->theme->settings->sideregionsmaxwidth));

theme_urep_check_colours_switch();
theme_urep_initialise_colourswitcher($PAGE);

$bodyclasses = array();
$bodyclasses[] = 'two-column';
$bodyclasses[] = 'urep-colours-' . theme_urep_get_colours();
if ($sideregionsmaxwidth) {
    $bodyclasses[] = 'side-regions-with-max-width';
}
 
$left = (!right_to_left());  // To know if to add 'pull-right' and 'desktop-first-column' classes in the layout for LTR.
echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- iOS Homescreen Icons -->
    <?php require_once(dirname(__FILE__).'/includes/iosicons.php'); ?>

    <script type="text/javascript"> 
        $(document).ready(function() {
                     
            $('.no-overflow img:not(.texrender), .resourceimage').on('click', function(){
                var screenTop = $(document).scrollTop();
                $(this).toggleClass("dialog");     
                $('.dialog').css('top', screenTop);   

           });        
        });
    </script>
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
                    <li class="navbar-text"><?php if (!isloggedin()) {
                        echo $OUTPUT->login_info();
                        echo '<style>.mainnav .nav {width:auto}</style>'; 
                    } ?></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php require_once(dirname(__FILE__).'/includes/page-navbar.php'); ?>

        <?php
        $COURSEFULLNAME = $COURSE->fullname;
         if ($COURSE->id == 1) {
            $COURSEFULLNAME = 'На главную страницу';
        }
        ?>

        <div class="courseinfo-wrapper container-fluid">
                <h1 class="backtocourse courseheading"><a title="Назад к курсу" href="<?php echo $CFG->wwwroot . '/course/view.php?id=' . $COURSE->id; ?>"><i class="fa fa-chevron-circle-left backtocourseicon"></i><?php echo $COURSEFULLNAME; ?></a></h2>
            <div class="coursename-teacher">
                <?php theme_urep_get_username(); ?> 
            </div>

        </div>
</header>

<!-- Start Main Regions -->
<div id="page" class="container-fluid">

    <div id="page-content" class="row-fluid">                                        

        <section id="region-main" class="span9<?php if ($left) { echo ' pull-right'; } ?>">



            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>

        <?php
        $classextra = '';
        if ($left) {
            $classextra = ' desktop-first-column';
        }
        echo $OUTPUT->blocks('side-pre', 'span3'.$classextra);
        ?>
        <?php 
            if ($COURSE->id == 1) {
                echo "<style>.block_course_contents {display: none !important;}</style>";
            } 
            else {
                echo "<style>.block_course_contents {display: block !important;}</style>";
            }
        ?>
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
