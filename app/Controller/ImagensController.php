<?php

App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Imoveis Controller
 *
 * @property Imovel $Imovel
 */
class ImagensController extends AppController {
	/**
     * lista imagens do imovel 
     *
     * @param string $id
     * @return void
     */
	 public function view($id = null) {	    	    
	    
	    if (!isset($id)) {
			throw new NotFoundException(__('Código de Imovel inválido.'));
		}
		
	    $dir = new Folder(WWW_ROOT . 'img/imoveis');
	    $fileName = "imovel".$id;
	    $files = $dir->find($fileName . "-.*");	    
	    
	    $this->set('imovel_id', $id);
        $this->set('files', $files);	    	    
	 }
	 
	 /**
     * deleta imagens do imovel 
     *
     * @param string $id
     * @return void
     */
	 public function delete($fileToDelete = null) {
		if (!isset($fileToDelete)) {
			throw new NotFoundException(__('Imagem do Imovel inválido.'));
		}
		
		$id = $this->request->query['id'];				
		$dir = new Folder(WWW_ROOT . 'img/imoveis');	    
	    $files = $dir->find(".*".$fileToDelete . ".*");	    

	    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);	        	        
	        $file->delete();
	        $file->close();
	    }	    
	    $this->redirect(array('action' => "view", $id ));		    
	 }
	 
	 /**
     * Seta imagen de capa 
     *
     * @param string $id
     * @return void
     */
	 public function setCapa($fileName = null) {        
		if (!isset($fileName)) {
			throw new NotFoundException(__('Imagem do Imovel inválido.'));
		}
		$dir = new Folder(WWW_ROOT . 'img/imoveis');	    
	    $files = $dir->find(".*".$fileName . ".*");	
	    
	    if(!isset($files)){
	        throw new NotFoundException(__('Imagem do Imovel Não Encontrado.'));
	        return false;
	    }
	    
	    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);	        	        
	        $path = $dir->slashTerm($dir->pwd());
	        $ext = $file->ext();
	        $defaultFileName = String::tokenize($file->name(), "-");
            $file->copy($path."/".$defaultFileName[0].'_capa.'.$ext);
	        $file->close();
	    }
	    //$this->redirect(array('action' => "view", $id ));		    
	     $this->autoRender=false;
	 }
	 
	 /**
     * uploade de imagens do imovel 
     *
     * @param string $id
     * @return void
     */
	 public function upload($id = null){	    
		if (!isset($id)) {
			throw new NotFoundException(__('Código de Imovel inválido.'));
		}
		$this->set('imovel_id', $id);
		if(isset($this->request->data['Arquivo']) && $this->isUploadedFile($this->request->data['Arquivo'])){		  
		  $this->uploadImage($id);	
		  
		  $this->redirect(array('action' => 'view/'.$id));		    
		} 
	 }
	
	
	public function isUploadedFile($params) {
        $val = array_shift($params);        
        if ((isset($val['error']) && $val['error'] == 0) ||
            (!empty( $val['tmp_name']) && $val['tmp_name'] != 'none')
        ) {
            return is_uploaded_file($val['tmp_name']);
        }
        return false;
    }
	
	public function uploadImage($id = null){
	
	    if(isset($id))
        {
	         //Some Settings
	        $ThumbSquareSize 		= 160; //Thumbnail will be 200x200
	        $BigImageMaxSize 		= 500; //Image Maximum height or width
	        $ThumbPrefix			= "thumb_"; //Normal thumb Prefix	
	        $DestinationDirectory	= WWW_ROOT . 'img/imoveis/'; //Upload Directory ends with / (slash)
	        $Quality 				= 90;

            $uploadedImage = $this->request->data['Arquivo']['file'];

	        // check $uploadedImage array is not empty
	        // "is_uploaded_file" Tells whether the file was uploaded via HTTP POST
	        if(!isset($this->request->data['Arquivo']['file']) || !is_uploaded_file($this->request->data['Arquivo']['file']['tmp_name']))
	        {
			        die('Something went wrong with Upload!'); // output error when above checks fail.
	        }
	
	        // Random number for both file, will be added after image name
	        $RandomNumber 	= rand(0, 9999999999); 

	        // Elements (values) of $uploadedImage array
	        //let's access these values by using their index position
	        $ImageName 		= str_replace(' ','-', 'imovel'.$id); 
	        $ImageSize 		= $uploadedImage['size']; // Obtain original image size
	        $TempSrc	 	= $uploadedImage['tmp_name']; // Tmp name of image file stored in PHP tmp folder
	        $ImageType	 	= $uploadedImage['type']; //Obtain file type, returns "image/png", image/jpeg, text/plain etc.

	        //Let's use $ImageType variable to check wheather uploaded file is supported.
	        //We use PHP SWITCH statement to check valid image format, PHP SWITCH is similar to IF/ELSE statements 
	        //suitable if we want to compare the a variable with many different values
	        switch(strtolower($ImageType))
	        {
		        case 'image/png':
			        $CreatedImage =  imagecreatefrompng($uploadedImage['tmp_name']);
			        break;
		        case 'image/gif':
			        $CreatedImage =  imagecreatefromgif($uploadedImage['tmp_name']);
			        break;			
		        case 'image/jpeg':
		        case 'image/pjpeg':
			        $CreatedImage = imagecreatefromjpeg($uploadedImage['tmp_name']);
			        break;
		        default:
			        die('Unsupported File!'); //output error and exit
	        }
	
	        //PHP getimagesize() function returns height-width from image file stored in PHP tmp folder.
	        //Let's get first two values from image, width and height. list assign values to $CurWidth,$CurHeight
	        list($CurWidth,$CurHeight)=getimagesize($TempSrc);
	        //Get file extension from Image name, this will be re-added after random name
	        $tempName = str_replace(' ','-',strtolower($uploadedImage['name']));
	        $ImageExt = substr($tempName, strrpos($tempName, '.'));
          	$ImageExt = str_replace('.','',$ImageExt);
	
	        //remove extension from filename
	        $ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
	
	        //Construct a new image name (with random number added) for our new image.
	        $NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;
	        //set the Destination Image
	        $thumb_DestRandImageName 	= $DestinationDirectory.$ThumbPrefix.$NewImageName; //Thumb name
	        $DestRandImageName 			= $DestinationDirectory.$NewImageName; //Name for Big Image
	
	        //Resize image to our Specified Size by calling resizeImage function.
	        if($this->resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType))
	        {
		        //Create a square Thumbnail right after, this time we are using cropImage() function
		        if(!$this->cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType))
			        {
				        echo 'Error Creating thumbnail';
			        }
		        /*
		        At this point we have succesfully resized and created thumbnail image
		        We can render image to user's browser or store information in the database		        
		        */              
		        
		        //configurar imagem de capa se não existir uma	        
		        $fotoCapa = "imovel.$id" . "_capa.$ImageExt";
		        $dir = new Folder($DestinationDirectory);
		        $files = $dir->find($fotoCapa);

		        if(count($files) == 0){
		            //não encontrou foto de capa então criamos uma
		            $this->setCapa($NewImageName);
		        }

	        }else{
		        die('Resize Error'); //output error
	        }
        }        
        }
        
        //This function corps image to create exact square images, no matter what its original size!
        function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType)
        {	 
	        
	        $isWidth = $iSize;
	        $isHeight = 120;
	        //Check Image size is not 0
	        if($CurWidth <= 0 || $CurHeight <= 0) 
	        {
		        return false;
	        }
	
	        //abeautifulsite.net has excellent article about "Cropping an Image to Make Square"
	        //http://www.abeautifulsite.net/blog/2009/08/cropping-an-image-to-make-square-thumbnails-in-php/
	        if($CurWidth>$CurHeight)
	        {
		        $y_offset = 0;
		        $x_offset = ($CurWidth - $CurHeight) / 2;
		        $square_size 	= $CurWidth - ($x_offset * 2);
	        }else{
		        $x_offset = 0;
		        $y_offset = ($CurHeight - $CurWidth) / 2;
		        $square_size = $CurHeight - ($y_offset * 2);
	        }
	
	        $NewCanves 	= imagecreatetruecolor($isWidth, $isHeight);	
	        if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $isWidth, $isHeight, $square_size, $square_size))
	        {
		        switch(strtolower($ImageType))
		        {
			        case 'image/png':
				        imagepng($NewCanves,$DestFolder);
				        break;
			        case 'image/gif':
				        imagegif($NewCanves,$DestFolder);
				        break;			
			        case 'image/jpeg':
			        case 'image/pjpeg':
				        imagejpeg($NewCanves,$DestFolder,$Quality);
				        break;
			        default:
				        return false;
		        }
	        //Destroy image, frees memory	
	        if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
	        return true;

	        }
	          
        }    


        // This function will proportionally resize image 
        function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
        {
	        //Check Image size is not 0
	        if($CurWidth <= 0 || $CurHeight <= 0) 
	        {
		        return false;
	        }
	
	        //Construct a proportional size of new image
	        $ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
	        $NewWidth  			= ceil($ImageScale*$CurWidth);
	        $NewHeight 			= ceil($ImageScale*$CurHeight);
	        $NewCanves 			= imagecreatetruecolor($NewWidth, $NewHeight);
	
	        // Resize Image
	        if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
	        {
		        switch(strtolower($ImageType))
		        {
			        case 'image/png':
				        imagepng($NewCanves,$DestFolder);
				        break;
			        case 'image/gif':
				        imagegif($NewCanves,$DestFolder);
				        break;			
			        case 'image/jpeg':
			        case 'image/pjpeg':
				        imagejpeg($NewCanves,$DestFolder,$Quality);
				        break;
			        default:
				        return false;
		        }
	        //Destroy image, frees memory	
	        if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
	        return true;
	        }

        }

}



