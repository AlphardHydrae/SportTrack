const db_connection = require("./sqlite_connection");

class ActivityDAO {
  constructor(database) {
    this.db = database;
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
      (err) => {
        if (err) {
          console.log("insert : ERROR", err);
        }
      }
    );
  }

  delete(key, callback) {
    return this.db.run("DELETE FROM Activite WHERE email = ?", [key], (err) => {
      if (err) {
        console.log("delete : ERROR", err);
      }
    });
  }

  findAll(callback) {
    return this.db.run("SELECT * FROM Activite", (err) => {
      if (err) {
        console.log("findAll : ERROR", err);
      }
    });
  }

  findByKey(key, callback) {
    return this.db.run(
      "SELECT * FROM Activite WHERE email = ?",
      [key],
      (err) => {
        if (err) {
          console.log("findAll : ERROR", err);
        }
      }
    );
  }
}

module.exports = ActivityDAO;
