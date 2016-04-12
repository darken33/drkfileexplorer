<?
/*
 * 10/29/2004 - 14:31:15
 *
 * drkFileExplorer.php - Explorateur de fichiers pour intranet ecrit en PHP
 * Copyright (C) 2004 Philippe Bousquet
 * <Darken33@free.fr>
 * http://darken33.free.fr/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */
?> 
<? echo"<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>"; ?>
<?
  // Le nom du script qui tourne actuellement
  if (!isset($program)) $program=basename($SCRIPT_FILENAME);

  //Les types Mimes
  $mime["pdf"]="imgs/pdf.png";
  $mime["doc"]="imgs/document.png";
  $mime["sxd"]="imgs/document.png";
  $mime["txt"]="imgs/txt.png";
  $mime["css"]="imgs/txt2.png";
  $mime["jpg"]="imgs/image.png";
  $mime["jpeg"]="imgs/image.png";
  $mime["gif"]="imgs/image.png";
  $mime["png"]="imgs/image.png";
  $mime["bmp"]="imgs/image.png";
  $mime["php"]="imgs/source_php.png";
  $mime["pl"]="imgs/source_pl.png";
  $mime["pm"]="imgs/source_pm.png";
  $mime["java"]="imgs/source_java.png";
  $mime["zip"]="imgs/tgz.png";
  $mime["gz"]="imgs/tgz.png";
  $mime["bz2"]="imgs/tgz.png";
  $mime["rpm"]="imgs/rpm.png";
  $mime["htm"]="imgs/html.png";
  $mime["html"]="imgs/html.png";
  $mime["wav"]="imgs/sound.png";
  $mime["mp3"]="imgs/sound.png";
  $mime["ogg"]="imgs/sound.png";
  $mime["mid"]="imgs/midi.png";
  $mime["mpg"]="imgs/video.png";
  $mime["mpeg"]="imgs/video.png";
  $mime["asf"]="imgs/video.png";
  $mime["avi"]="imgs/video.png";
  $unknow="imgs/unknown.png";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <title>DrkFileExplorer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta lang=en content=", File Explorer written in PHP" name="description" />
    <meta lang=en content="file, explorer, free, software, php, xhtml, css" name="keywords" />
    <meta name="author" lang="fr" content="Philippe Bousquet" />
    <meta name="copyright" content="&copy; 2004 Philippe Bousquet." />
    <meta name="license" content="GNU General Public License." />
    <link href="style.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <form action="drkfilebrowser.php" method="post"  enctype="multipart/form-data">
    <div class="window">
    <div class="title">DrkFileExplorer v0.3</div>
    <div class="header">
<?     
    // La racine est $DOCUMENT_ROOT
    if (($curdir=="") || (strlen($curdir) < strlen($DOCUMENT_ROOT))) $curdir=$DOCUMENT_ROOT;
    
    // On remonte d'un répertoire ?
    if (basename($curdir)=="..") $curdir=dirname(dirname($curdir));

    // on fait un Upload du fichier  
    if ($action!="")
    {
      $f=basename($fichier_name);
      $file_dst=$curdir."/".$f;
      if (is_uploaded_file($fichier)) 
      {
         copy($fichier, $file_dst);
      }
    }
    
    // On ouvre le répertoire
    $dir=dir($curdir);
?>
      <img src="imgs/folder_open.png" alt="CURDIR-" /><? echo " ".str_replace($DOCUMENT_ROOT, "", $curdir)."/"; ?>
      <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
      &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Upload : <input type="file" name="fichier" value="" />
      <? echo '<input type="hidden" name="curdir" value="'.$curdir.'" />'; ?>
      <input type="submit" name="action" value="go" />
   </div>
    <div class="folder">
<?
// On lit d'abord les répertoires 
while ($file = $dir->read()) 
{
  if($file !='.' && $file !='' && ($curdir!=$DOCUMENT_ROOT || $file!=".."))
  { 
	 	if (is_dir("$curdir/$file"))
    {
      echo "<div class=\"fileinfo\">\n";
      echo "<img src=\"imgs/folder.png\" alt=\"DIR-\" />";
      $nextdir=$curdir."/".$file;
      echo " <a href=\"$program?curdir=$nextdir\">";
      echo "$file";
      echo "</a>\n";
      echo "</div>\n";
    }  
  }  
}   

$dir->rewind();
$file="";
// Ensuite on lit les fichiers. 
while ($file = $dir->read()) 
{
	if($file !='.' && $file !=''  &&  ($curdir!=$DOCUMENT_ROOT || $file!=".."))
  { 
		if (is_file("$curdir/$file"))
    {
      // get the extension
      $ext=end(split("\.",$file));
      if ($mime["$ext"]!="")
      {
        $image=$mime[$ext];
        $alt=strtoupper($ext)."-";
      }
      else
      {
        $image=$unknow;
        $alt="???-";
      }
      echo "<div class=\"fileinfo\">\n";
      echo "<img src=\"$image\" alt=\"$alt\" />";
      echo " <a href=\"$curdir/$file\" target=\"$dest\">";
      echo "$file";
      echo "</a>\n";
      echo "</div>\n";
    }
  }  
}   

// on fermer le répertoire
$dir->close();
clearstatcache();
?>    
    </div>
    <div class="footer">
      Copyright &copy; 2004 Philippe BOUSQUET<br/>
      This software is under GNU General Public License
    </div>
    </div>
    </form> 
  </body>
</html>