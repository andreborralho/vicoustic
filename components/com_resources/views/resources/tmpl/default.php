<?php
/**
 * @version     1.0.0
 * @package     com_resources
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;

$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
$document->addScript('scripts/components.js');
?>

<h1 class="page_title">Resources</h1>


<div class="resources_icon_list">
    <div id ="catalogs_icon" class="resource_icon">
        <img alt="" src="images/icons/ICON-CATALOGO.png" width="30px" height="35px"><br>
        <div id="resource_icon_label_catalogs" class="resource_icon_label resource_icon_checked">Catalogs</div>
    </div>
    <div id ="technical_files_icon" class="resource_icon">
        <img alt="" src="images/icons/ICON-TECNICAL.png" width="30px" height="35px"><br>
        <div id="resource_icon_label_technical_files" class="resource_icon_label">Technical Files</div>
    </div>
    <div id ="logos_icon" class="resource_icon">
        <img alt="" src="images/icons/ICON-LOGOS.png" width="30px" height="35px"><br>
        <div id="resource_icon_label_logos" class="resource_icon_label">Logos</div>
    </div>
    <div id ="product_photos_icon" class="resource_icon">
        <img alt="" src="images/icons/ICON-FOTOS.png" width="30px" height="35px"><br>
        <div id="resource_icon_label_product_photos" class="resource_icon_label">Product Photos</div>
    </div>
</div>

<div id="catalogs_entry" style="display:none">
     <div class="resource2_entry">
        <?php 
            /*$zip = new ZipArchive();*/
            $filename = "images/pdfs/catalogs/vicoustic_catalogs.zip";
            /*unlink($filename);

            if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                exit("cannot open <$filename>\n");
            }*/
        ?>

    	<?php foreach (JFolder::files(JPATH_ROOT.'/images/pdfs/catalogs', $filter = '.pdf') as $file): ?>
            <a href="images/pdfs/catalogs/<?php echo $file; ?>"><?php echo $file; ?></a><br>
            <?php /*$zip->addFile("images/pdfs/catalogs/".$file, $file); */?>
        <?php endforeach; ?>

        <?php /*$zip->close(); */?>
    </div>
    <!--div class="resource_download">
        <a href="<?php /*echo $filename */?>">Download All</a>
    </div-->
</div>

<div id="technical_files_entry" class="resources_list_entry" style="display:none">
    
    <div class="resource_wide_entry">
        <div class="resource_entry">
        	<div class="resource_product">Panels</div>

            <?php 
                /*$zip = new ZipArchive();*/
                $filename = "images/pdfs/panels/technical_files/vicoustic_panels_technical_files.zip";
                /*unlink($filename);

                if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                    exit("cannot open <$filename>\n");
                }*/
            ?>

        	<?php foreach (JFolder::files(JPATH_ROOT.'/images/pdfs/panels/technical_files', $filter = '.pdf') as $file): ?>
                <a href="images/pdfs/panels/technical_files/<?php echo str_replace(" ", "-", $file); ?>"><?php echo $file; ?></a><br>
                <?php /*$zip->addFile("images/pdfs/panels/technical_files/".$file, $file); */?>
            <?php endforeach; ?>

            <?php /*$zip->close(); */?>
        </div>
        <!--div class="resource_download"><a href="<?php /*echo $filename;*/ ?>">Download All</a></div-->
    </div>
    
    <div class="resource_wide_entry">
        <div class="resource_entry">
            <div class="resource_product">Acoustic Doors</div>
            <?php 
                /*$zip = new ZipArchive();*/
                $filename = "images/pdfs/doors/technical_files/vicoustic_doors_technical_files.zip";
                /*unlink($filename);

                if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                    exit("cannot open <$filename>\n");
                }*/
            ?>

        	<?php foreach (JFolder::files(JPATH_ROOT.'/images/pdfs/doors/technical_files', $filter = '.pdf') as $file): ?>
                <a href="images/pdfs/doors/technical_files/<?php echo $file; ?>"><?php echo $file; ?></a><br>
                <?php /*$zip->addFile("images/pdfs/doors/technical_files/".$file, $file); */?>
            <?php endforeach; ?>

            <?php /*$zip->close(); */?>
        </div>
        <div class="resource_download"><a href="<?php echo $filename ?>">Download All</a></div>
    </div>

    <div class="resource_wide_entry">
    	<div class="resource_entry">
        	<div class="resource_product">Blankets</div>
            <?php 
                /*$zip = new ZipArchive();*/
                $filename = "images/pdfs/blankets/technical_files/vicoustic_blankets_technical_files.zip";
                /*unlink($filename);

                if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                    exit("cannot open <$filename>\n");
                }*/
            ?>

        	<?php foreach (JFolder::files(JPATH_ROOT.'/images/pdfs/blankets/technical_files', $filter = '.pdf') as $file): ?>
                <a href="images/pdfs/blankets/technical_files/<?php echo $file; ?>"><?php echo $file; ?></a><br>
                <?php /*$zip->addFile("images/pdfs/blankets/technical_files/".$file, $file); */?>
            <?php endforeach; ?>

            <?php /*$zip->close(); */?>
        </div>
        <div class="resource_download"><a href="<?php echo $filename ?>">Download All</a></div>
    </div>

    <div class="resource_wide_entry">
        <div class="resource_entry">
            <div class="resource_product">Anti-Vibratics</div>

            <?php 
                /*$zip = new ZipArchive();*/
                $filename = "images/pdfs/antivibratics/technical_files/vicoustic_antivibratics_technical_files.zip";
                /*unlink($filename);

                if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                    exit("cannot open <$filename>\n");
                }*/
            ?>

        	<?php foreach (JFolder::files(JPATH_ROOT.'/images/pdfs/antivibratics/technical_files', $filter = '.pdf') as $file): ?>
                <a href="images/pdfs/antivibratics/technical_files/<?php echo $file; ?>"><?php echo $file; ?></a><br>
                <?php /*$zip->addFile("images/pdfs/antivibratics/technical_files/".$file, $file); */?>
            <?php endforeach; ?>

            <?php /*$zip->close(); */?>
        </div>
        <div class="resource_download"><a href="<?php echo $filename ?>">Download All</a></div>
    </div>

    <div class="resource_wide_entry">
        <div class="resource_entry">
            <div class="resource_product">Accessories</div>
            <?php 
                /*$zip = new ZipArchive();*/
                $filename = "images/pdfs/accessories/technical_files/vicoustic_accessories_technical_files.zip";
                /*unlink($filename);

                if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                    exit("cannot open <$filename>\n");
                }*/
            ?>

        	<?php foreach (JFolder::files(JPATH_ROOT.'/images/pdfs/accessories/technical_files', $filter = '.pdf') as $file): ?>
                <a href="images/pdfs/accessories/technical_files/<?php echo $file; ?>"><?php echo $file; ?></a><br>
                <?php /*$zip->addFile("images/pdfs/accessories/technical_files/".$file, $file); */?>
            <?php endforeach; ?>

            <?php /*$zip->close(); */?>
        </div>
        <div class="resource_download"><a href="<?php echo $filename ?>">Download All</a></div>
    </div>
</div>


<?php 

    // Allowed filetypes
    $allowedExtensions = array('jpg','png','gif');
    // Also allow filetypes in uppercase
    $allowedExtensions = array_merge($allowedExtensions, array_map('strtoupper', $allowedExtensions));
    // Build the filter. Will return something like: "jpg|png|JPG|PNG|gif|GIF"
    $filter = implode('|',$allowedExtensions);
    $filter = "^.*\.(" . implode('|',$allowedExtensions) .")$";
?> 

<div id="logos_entry" class="files_list_entry" style="display:none">
    <div class="resource2_entry">
        <?php 
            /*$zip = new ZipArchive();*/
            $filename = "images/logos/vicoustic_logos.zip";
            /*unlink($filename);

            if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                exit("cannot open <$filename>\n");
            }*/
        ?>

    	<?php foreach (JFolder::files(JPATH_ROOT.'/images/logos', $filter) as $file): ?>
            <img alt="logo" src="images/logos/<?php echo $file; ?>" width="350px" height="120px">
            <?php /*$zip->addFile("images/logos/".$file, $file); */?>
        <?php endforeach; ?>

        <?php /*$zip->close(); */?>
    </div>
    <div class="resource_download">
        <a href="<?php echo $filename ?>">Download All</a>
    </div>
</div>


<div id="product_photos_entry" class="resources_list_entry" style="display:none">

    <div class="resource_wide_entry">
        <div class="resource_entry">
            <div class="resource_product">Panels</div>        
            <?php
                /*$zip = new ZipArchive();*/
                $filename = "images/panels/vicoustic_panel_photos.zip";
                /*unlink($filename);

                if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                    exit("cannot open <$filename>\n");
                }*/
            ?>

            <?php foreach (JFolder::files(JPATH_ROOT.'/images/panels/photos_1024px', $filter) as $file): 
                $current_image = str_replace("HD", "150", $file); ?>
                <img alt="<?php echo $file; ?>" title="<?php echo $file; ?>" src="images/panels/photos_150px/<?php echo $current_image; ?>" width="100px" height="100px">
                <?php /*$zip->addFile("images/panels/photos_1024px/".$file, $file);*/ ?>
            <?php endforeach; ?>

            <?php /*$zip->close(); */?>
        </div>
        <div class="resource_download"><a href="<?php echo $filename ?>">Download All</a></div>
    </div>

    <div class="resource_wide_entry">
        <div class="resource_entry">
            <div class="resource_product">Acoustic Doors</div>        
            <?php
                /*$zip = new ZipArchive();*/
                $filename = "images/doors/vicoustic_door_photos.zip";
                /*unlink($filename);

                if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                    exit("cannot open <$filename>\n");
                }*/
            ?>

            <?php foreach (JFolder::files(JPATH_ROOT.'/images/doors/photos_1024px', $filter) as $file): ?>
                <img alt="<?php echo $file; ?>" title="<?php echo $file; ?>" src="images/doors/photos_150px/<?php echo $file; ?>" width="100px" height="100px">
                <?php /*$zip->addFile("images/doors/photos_1024px/".$file, $file);*/ ?>
            <?php endforeach; ?>
           
            <?php /*$zip->close(); */?>
        </div>
        <div class="resource_download"><a href="<?php echo $filename ?>">Download All</a></div>
    </div>
    
    <div class="resource_wide_entry">
        <div class="resource_entry">
            <div class="resource_product">Blankets</div>        
            <?php
                /*$zip = new ZipArchive();*/
                $filename = "images/blankets/vicoustic_blanket_photos.zip";
                /*unlink($filename);

                if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                    exit("cannot open <$filename>\n");
                }*/
            ?>

            <?php foreach (JFolder::files(JPATH_ROOT.'/images/blankets/photos_1024px', $filter) as $file): ?>
                <img alt="<?php echo $file; ?>" title="<?php echo $file; ?>" src="images/blankets/photos_150px/<?php echo $file; ?>" width="100px" height="100px">
                <?php /*$zip->addFile("images/blankets/photos_1024px/".$file, $file);*/ ?>
            <?php endforeach; ?>        

            <?php /*$zip->close();*/ ?>
        </div>
        <div class="resource_download"><a href="<?php echo $filename ?>">Download All</a></div>
    </div>

    <div class="resource_wide_entry">
        <div class="resource_entry">
            <div class="resource_product">Anti-Vibratics</div>        
            <?php
                /*$zip = new ZipArchive();*/
                $filename = "images/antivibratics/vicoustic_antivibratics_photos.zip";
                /*unlink($filename);

                if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                    exit("cannot open <$filename>\n");
                }*/
            ?>

            <?php foreach (JFolder::files(JPATH_ROOT.'/images/antivibratics/photos_1024px', $filter) as $file): ?>
                <img alt="<?php echo $file; ?>" title="<?php echo $file; ?>" src="images/antivibratics/photos_150px/<?php echo $file; ?>" width="100px" height="100px">
                <?php /*$zip->addFile("images/antivibratics/photos_1024px/".$file, $file);*/ ?>
            <?php endforeach; ?>           

            <?php /*$zip->close();*/ ?>
        </div>
        <div class="resource_download"><a href="<?php echo $filename ?>">Download All</a></div>
    </div>

    <div class="resource_wide_entry">
        <div class="resource_entry">
            <div class="resource_product">Accessories</div>        
            <?php
                /*$zip = new ZipArchive();*/
                $filename = "images/accessories/vicoustic_accessory_photos.zip";
                /*unlink($filename);

                if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                    exit("cannot open <$filename>\n");
                }*/
            ?>

            <?php foreach (JFolder::files(JPATH_ROOT.'/images/accessories/photos_1024px', $filter) as $file): ?>
                <img alt="<?php echo $file; ?>" title="<?php echo $file; ?>" src="images/accessories/photos_150px/<?php echo $file; ?>" width="100px" height="100px">
                <?php /*$zip->addFile("images/accessories/photos_1024px/".$file, $file);*/ ?>
            <?php endforeach; ?>

            <?php /*$zip->close();*/ ?>
        </div>
        <div class="resource_download"><a href="<?php echo $filename ?>">Download All</a></div>
    </div>
</div>