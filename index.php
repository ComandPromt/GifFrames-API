<?php



include("funciones.php");




    include_once ( str_replace('\\','/',dirname(__FILE__) ) ."/GIFDecoder.class.php" );
	
	$numimagenes=check_images("..\GifFrames","gif");
	
		if($numimagenes[0]!="picture.gif"){
			rename($numimagenes[0],"picture.gif");
		}
				
		$animation = 'picture.gif';
		$gifDecoder = new GIFDecoder ( fread ( fopen ( $animation, "rb" ), filesize ( $animation ) ) );
		$i = 1;
		
		foreach ( $gifDecoder -> GIFGetFrames ( ) as $frame ) {
			
			if ( $i < 10 ) {
				fwrite ( fopen ( "frame0$i.png" , "wb" ), $frame );
			}
			
			else {
				fwrite ( fopen ( "frame$i.png" , "wb" ), $frame );
			}
			
			$i++;
		}
		unlink("picture.gif");
		print '<h1 name="salida">Exito!</h1>';
	
	
	
	
?>
