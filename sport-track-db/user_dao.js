const db_connection = require("./sqlite_connection");

class UserDAO {
  constructor() {
    this.db = db_connection;
  }

  insert(values, callback) {
    return this.db.run(
      "INSERT INTO Utilisateur(nom, prenom, dateDeNaissance, sexe, taille, poids, email, mdp) VALUES (?,?,?,?,?,?,?,?)",
      [
        values.nom,
        values.prenom,
        values.dob,
        values.gender,
        values.height,
        values.weight,
        values.email,
        values.pwd,
      ],
      (err) => {
        if (err) {
          console.log("insert : ERROR", err);
        }
      }
    );
  }

  update(key, values, callback) {
    return this.db.run(
      "UPDATE Utilisateur SET nom = ?, prenom = ?, dateDeNaissance = ?, sexe = ?, taille = ?, poids = ?, mdp = ?  WHERE email = ?",
      [
        values.nom,
        values.prenom,
        values.dob,
        values.gender,
        values.height,
        values.weight,
        values.pwd,
        key,
      ],
      (err) => {
        if (err) {
          console.log("update : ERROR", err);
        }
      }
    );
  }

  delete(key, callback) {
    return this.db.run(
      "DELETE FROM Utilisateur WHERE email = ?",
      [key],
      (err) => {
        if (err) {
          console.log("delete : ERROR", err);
        }
      }
    );
  }

  findAll(callback) {
    return this.db.run("SELECT * FROM Utilisateur", (err) => {
      if (err) {
        console.log("findAll : ERROR", err);
      }
    });
  }
}

let user = new UserDAO();
module.exports = user;
