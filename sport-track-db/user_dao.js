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
      function (err, rows) {
        if (err) {
          callback("insert : ERROR", null);
        } else {
          callback(null, rows);
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
      function (err, rows) {
        if (err) {
          callback("update : ERROR", null);
        } else {
          callback(null, rows);
        }
      }
    );
  }

  delete(key, callback) {
    return this.db.run(
      "DELETE FROM Utilisateur WHERE email = ?",
      [key],
      function (err, rows) {
        if (err) {
          callback("delete : ERROR", null);
        } else {
          callback(null, rows);
        }
      }
    );
  }

  findAll(callback) {
    return this.db.all("SELECT * FROM Utilisateur", function (err, rows) {
      if (err) {
        callback("findAll : ERROR", null);
      } else {
        callback(null, rows);
      }
    });
  }
}

let user = new UserDAO();
module.exports = user;
