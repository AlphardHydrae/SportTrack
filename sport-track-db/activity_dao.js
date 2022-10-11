const db_connection = require("./sqlite_connection");

class ActivityDAO {
  constructor() {
    this.db = db_connection;
  }

  insert(values, callback) {
    return this.db.run(
      "INSERT INTO Activite(date,description,fMin,fMax,fMoy,hDebut,hFin,duree,distance,unUtilisateur) VALUES (?,?,?,?,?,?,?,?,?,?)",
      [
        values.date,
        values.description,
        values.fMin,
        values.fMax,
        values.fMox,
        values.hDebut,
        values.hFin,
        values.duree,
        values.dist,
        values.email,
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

  delete(key, callback) {
    return this.db.run(
      "DELETE FROM Activite WHERE email = ?",
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
    return this.db.all("SELECT * FROM Activite", function (err, rows) {
      if (err) {
        callback("findAll : ERROR", null);
      } else {
        callback(null, rows);
      }
    });
  }

  findByKey(key, callback) {
    return this.db.get(
      "SELECT * FROM Activite WHERE email = ?",
      [key],
      function (err, rows) {
        if (err) {
          callback("findAll : ERROR", null);
        } else {
          callback(null, rows);
        }
      }
    );
  }
}

let activity = new ActivityDAO();
module.exports = activity;
