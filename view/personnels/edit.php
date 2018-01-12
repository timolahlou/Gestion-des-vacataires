<?php if ($this->Session->user('ROLE')=='2') {
        include "../view/layout/head-vacataire.php";
}else{
        include "../view/layout/head.php"; 
} ?>
<div class="modal-body">
          <form action="<?php echo Router::url('personnels/edit/'.$id); ?>" method="post">
                <div class="form-group">
                <input class="form-control " name="NOM" type="text" value="<?php echo $pers->NOM;  ?>">
                <input class="form-control " name="ID" type="hidden" value="<?php echo $pers->ID;  ?>">
                </div>

                <div class="form-group">
                <input class="form-control " name="PRENOM" type="text" value="<?php echo $pers->PRENOM;  ?>">
                </div>
                
                <div class="form-group">
                <input class="form-control " name="EMAIL" type="text" value="<?php echo $pers->EMAIL;  ?>">
                </div>

                <div class="form-group">
                <input class="form-control " name="MDP" type="password" placeholder="veuillez resaisir votre mot de passe">
                </div>

                <div class="form-group">
                <input class="form-control " name="TEL" type="text" value="<?php echo $pers->TEL;  ?>">
                </div>
                <div class="form-group">
                <label for="sel1">Select list:</label>
                <select name="ROLE" class="form-control" id="sel1">
                  <option value="<?php echo $pers->ROLE;  ?>" selected><?php if ($pers->ROLE == 1) { echo "Responsable Administratif"; }elseif($pers->ROLE == 2){ echo "Vacataire"; }elseif($pers->ROLE == 3){ echo "Responsable Financier"; }  ?></option>
                  <option>Responsable administratif</option>
                  <option>Vacataire</option>
                  <option>Responsable financier</option>
                </select>
                </div>
              </div> 
              <div class="modal-footer ">
        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Modifier</button>
      </div>                 
      </form>
      </div>