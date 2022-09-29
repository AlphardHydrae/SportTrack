<?php
// Retourne le formulaire de création de compte

public class AddUserController extends Controller{
    public function get(&request){
        $this -> render('user_add',[]);
    }
    public function post(&request){
        $this->render('user_add_info',['nom' => $request['nom'], 'prenom' => $request['prenom'],'email' => $request['email'],'mdp' => $request['mdp'],'dateDeNaissance' => $request['dateDeNaissance'],'sexe' => $request['sexe'],'taille' => $request['taille'],'poids' => $request['poids'],]);
    }
}

?>