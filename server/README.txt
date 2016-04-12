==============================================================================
drkFileExplorer v0.3
Explortateur de fichier en PHP pour serveur WEB
Copyright (c) 2004 - Philippe Bousquet <Darken33@free.fr>
http://darken33.free.fr/
Ce logiciel est distribu� sous licence Gnu General Public License
==============================================================================

1 FONCTIONNALITEES
2 INSTALLATION
3 COPYRIGHT & LICENCE
4 CONTENU DE L'ARCHIVE

------------------------------------------------------------------------------

FONCTIONNALITEES
----------------
Ce logiciel permet de naviguer, dans l'arboressance d'un serveur web :
 - acc�s aux r�pertoires & fichiers
 - upload de fichiers

En fait j'ai cr�� ce petit explortaeur pour mon serveur web de d�veloppement,
car je d�sirais pouvoir naviguer � ma guise parmis tous mes r�p�rtoires.

------------------------------------------------------------------------------
 
INSTALLATION
------------
La premi�re chose � faire est de d�compresser l'archive drkfileexplorer-0.3.tar.gz
sur votre serveur web (g�n�ralement dans le repertoire /var/www/html/) :
  # tar xzf drkfileexplorer-0.3.tar.gz

L'ideal est de faire un lien simbolique de drkfilebrowser.php en index.php :
  # cd /var/www/html/drkfilebrowser/
  # ln -s drkfilebrowser.php index.php

Vous pouvez maintenant naviguer en tapant l'adresse suivante sur votre Navigateur :
  http://localhost/drkfilebrowser/

------------------------------------------------------------------------------

COPYRIGHT & LICENSE
-------------------
DrkFileExplorer Copyright (c) 2004 - Philippe Bousquet

Ce logiciel est distribu� selon les termes de la licence Gnu General Public License,
pour plus d'information veuillez consulter le fichier Lincense.txt.

------------------------------------------------------------------------------

CONTENU DE L'ARCHIVE
--------------------

drkfileexplorer-0.3/
|   drkfileexplorer.php // Fichier php pour drkfilebrowser
|   License.txt         // La Gnu General Public License
|   README.txt          // Ce fichier que vous lisez ;-) 
|   style.css          // Th�me par d�faut
|           
+---imgs/                
      ascii.png
      binary.png
      document.png
      dvi.png
      folder_open.png
      folder.png
      html.png
      image.png
      midi.png
      netscape_doc.png
      pdf.png
      quicktime.png
      readme.png
      rpm.png
      sound.png
      source_c.png
      source_cpp.png
      source_java.png
      source_php.png
      source_pl.png
      source.png      
      source_py.png
      tgz.png
      trash.png
      txt2.png
      txt.png
      unknown.png
      video.png

==============================================================================
