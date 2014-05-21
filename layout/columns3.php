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

// Get the HTML for the settings bits.
$html = theme_ciudadaniastheme_get_html_for_settings($OUTPUT, $PAGE);

global $USER,$COURSE,$PAGE;

$nombre = fullname($USER);
 
$left = (!right_to_left());  // To know if to add 'pull-right' and 'desktop-first-column' classes in the layout for LTR.
echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot; ?>/theme/ciudadaniastheme/style/ciudadanias.css" />
</head>

<body <?php echo $OUTPUT->body_attributes('two-column'); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header id="encabezado" role="banner" class="navbar navbar-fixed-top<?php echo $html->navbarclass ?> moodle-has-zindex">
    <nav role="navigation" class="navbar-inner" id="barraSuperior">
        <div class="container-fluid">
            <a class="brand" href="<?php echo $CFG->wwwroot;?>"><img src="<?php echo $CFG->wwwroot; ?>/theme/ciudadaniastheme/pix/ciudadanias.png"></a>
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                <?php if ($nombre) { ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Usuario">
							<?php echo $nombre; ?>
							<b class="caret"></b>
							<?php
								$user_picture=new user_picture($USER);
								$src=$user_picture->get_url($PAGE);
								echo "<img src='$src' class='img-circle' style='width: 40px;'>";
							?>
						</a>
						<ul class="dropdown-menu">
							<?php //echo $OUTPUT->page_heading_menu(); ?>
							<li>
								<a href="<?php echo $CFG->wwwroot; ?>/user/profile.php?id=<?php echo $USER->id;//$OUTPUT->login_info() ?>">Mi perfil</a>
							</li>
							<li>
								<a href="<?php echo $CFG->wwwroot; ?>/login/logout.php?sesskey=<?php echo $USER->sesskey; ?>">Salir de Ciudadanías</a>
							</li>
						</ul>
					</li>
				<?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="page" class="container-fluid">

    <header id="page-header" class="clearfix">
        <div id="page-navbar" class="clearfix">
            <div class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></div>
            <nav class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></nav>
        </div>
        <?php /*
        <?php echo $html->heading; ?>
        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
		*/ ?>
    </header>

    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span9<?php if ($left) { echo ' pull-left'; } ?>">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
        <?php
        $classextra = '';
        if ($left) {
            $classextra = '';// desktop-first-column';
        }
        echo $OUTPUT->blocks('side-pre', 'span3'.$classextra);
        ?>
    </div>

    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
        <!-- <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p> -->
        <?php
        echo $html->footnote;
        echo $OUTPUT->login_info();
        //echo $OUTPUT->home_link();
        echo "<div class='footerCiudadanias container-fluid'>";
        echo "   <div class='row-fluid'>";
        echo "      <div class='span2'>2014® CIUDADANÍAS</div>";
        echo "      <div class='span4'>&nbsp;</div>";
        echo "      <div class='span6'>";
        echo "          <a href='http://www.oas.org/es/' target='_blank'><img border='0' src='".$CFG->wwwroot."/theme/ciudadaniastheme/pix/logoOEI.jpg'></a>";
        echo "          <a href='http://www.sic.inep.gov.br/es-ES/' target='_blank'><img border='0' src='".$CFG->wwwroot."/theme/ciudadaniastheme/pix/logoMercosur.jpg'></a>";
        echo "          <a href='http://parlamentojuvenil.educ.ar/' target='_blank'><img border='0' src='".$CFG->wwwroot."/theme/ciudadaniastheme/pix/logoParlamentoJuvenil2014.jpg'></a>";
        echo "      </div><!-- /.span4 -->";
        echo "   </div><!-- /.row-fluid -->";
        echo "</div><!-- /.footerCiudadanias .container-fluid -->";
        echo $OUTPUT->standard_footer_html();
        ?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>
