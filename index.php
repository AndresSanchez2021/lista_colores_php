<?php 
    include_once 'conexion.php';

    $sql_leer='SELECT * FROM colores';
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute(); 
    
    $r=$gsent->fetchAll();


    #--------Formulario--------
    if($_POST){
        $color= $_POST['color'];
        $desc = $_POST['descripcion'];
        
        $sql_add = 'INSERT INTO colores (color,descripcion) VALUES (?,?)';
        $sentencia_add = $pdo->prepare($sql_add);
        $sentencia_add->execute(array($color,$desc));

        header('location:index.php');
    }
    #----------Editar-------------GET
    if($_GET){
        $id=$_GET['id'];
        
        $sql_query='SELECT * FROM colores WHERE id=?';
        $gsent_query= $pdo->prepare($sql_query);
        $gsent_query->execute(array($id)); 
        
        $dataEdit=$gsent_query->fetch();
        /* var_dump( $dataEdit);    */     
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md">
                <?php foreach($r as $data){?>
                    <div class="alert alert-<?php echo $data['color']?> d-flex justify-content-between">
                        <?php echo $data['color'] ?>               
                        <a href="index.php?id=<?php echo $data['id']?>" class="text-black">
                            <span class="fa fa-edit "></span>  
                        </a>
                           
                    </div>
                <?php } ?>
            </div>
            <div class="col-md">
                <?php if(!$_GET){?>
                    <div class="card">
                        <div class="card-header bg-info text-center text-white"><strong>Agregar color <span class="fa fa-plus "></span>  </strong></div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group row">
                                    <label for="color" class="col-md-2 col-form-label">Color:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="color" placeholder="Ingrese el color">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="descripcion" class="col-md-2 col-form-label">Descripción:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="descripcion" placeholder="Ingrese una pequeña descripcion">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="offset-md-2 col-md-10">
                                        <button class="btn btn-info">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="card">
                        <div class="card-header bg-info text-center text-white"><strong>Editar color <span class="fa fa-edit "></span>  </strong></div>
                        <div class="card-body">
                            <form method="GET" action="editar.php">
                                <div class="form-group row">
                                    <label for="id" class="col-md-2 col-form-label">ID:</label>
                                    <div class="col-md-10">
                                        <input type="text"  class="form-control" name="id" value="<?php echo $dataEdit['id']?>">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="color" class="col-md-2 col-form-label">Color:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="color" value="<?php echo $dataEdit['color']?>" placeholder="Ingrese el color">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="descripcion" class="col-md-2 col-form-label">Descripción:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="descripcion" value="<?php echo $dataEdit['descripcion']?>" placeholder="Ingrese una pequeña descripcion">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="offset-md-2 col-md-10">
                                        <button class="btn btn-info text-white">Guardar cambios</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }?>

            </div>
        </div>
    </div>
</body>
</html>