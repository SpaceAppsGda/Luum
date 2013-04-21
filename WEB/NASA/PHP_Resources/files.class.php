<?PHP class Upload {
    var $maxsize = 0;
    var $message = "";
    var $newfile = "";
    var $newpath = "";
   
    var $filesize = 0;
    var $filetype = "";
    var $filename = "";
    var $filetemp;
    var $fileexte;
   
    var $allowed;
    var $blocked;
    var $isimage;
    var $isupload;
   
    function Upload()
     {
        $this->allowed = array("image/bmp","image/gif","image/jpeg","image/pjpeg","image/png","image/x-png");
        $this->blocked = array("php","phtml","php3","php4","js","shtml","pl","py","exe","html","pyw","ps","java","jsp","sql","doc","xls","mov");
        $this->message = "";
        $this->isupload = false;
    }
    function setFile($field) 
    {
        $this->filesize = $_FILES[$field]['size'];
        $this->filename = $_FILES[$field]['name'];
        $this->filetemp = $_FILES[$field]['tmp_name'];
        $this->filetype = $_FILES[$field]['type'];
        $this->fileexte = substr($this->filename, strrpos($this->filename, '.')+1);

        $this->newfile = substr(md5(uniqid(rand())),0,8).date("U").".".$this->fileexte;
       // $this->newfile = substr(md5(uniqid(rand())),0,8);
    }
    function setPath($value)
     {
        $this->newpath = $value;
    }
    function setMaxSize($value) 
    {
        $this->maxsize = $value;   
    }
    function isImage($value) 
    {
        $this->isimage = $value;
    }
    function save() {
        if (is_uploaded_file($this->filetemp))
         {
            // check if file valid
            if ($this->filename == "") {
                $this->message = "No hay archivo para subir";
                $this->isupload = false;
                return false;
            }
            // check max size
            if ($this->maxsize != 0) {
                if ($this->filesize> $this->maxsize*1024) {
                    $this->message = "El archivo sobrepasa el límite de 5MB";
                    $this->isupload = false;
                    return false;
                }
            }
            // check if image
            if ($this->isimage) {
                // check dimensions
                if (!getimagesize($this->filetemp)) {
                    $this->message = "Formato invalido de imagen";
                    $this->isupload = false;
                    return false;   
                }
                // check content type
                if (!in_array($this->filetype, $this->allowed)) {
                    $this->message = "Tipo inválido de contenido";
                    $this->isupload = false;
                    return false;
                }
            }
            // check if file is allowed
            if (in_array($this->fileexte, $this->blocked)) {
                $this->message = "No se permite subir archivos de éste tipo - ".$this->fileexte;
                $this->isupload = false;
                return false;
            }
                   
            if (move_uploaded_file($this->filetemp, $this->newpath. $this->newfile)) {
                $this->message = "Su archivo se ha subido satisfactoriamente"; //En realidad ya lo subió
				$this->cuerpo =  $this->newfile; //regresa el path para guardarlo en la base de datos
                $this->isupload = true;
                return true;
            } else {
                $this->message = "El archivo no se ha podido subir, por favor intente nuevamentesss";
                $this->isupload = false;
                return false;
            }
        } else {
            $this->message = "El archivo no se ha podido subir, por favor intente nuevamenteasdas";
            $this->isupload = false;
            return false;
        }
    }
	
}