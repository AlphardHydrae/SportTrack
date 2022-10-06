const db_connection = require("./sqlite_connection");

class ActivityEntryDAO {
  constructor(database) {
    this.db = db;
  }

  insert(values, callback) {
    return this.db.run(
      "INSERT INTO Data(time,freqCardiaque,latitude,longitude,altitude,uneActivite) VALUES (?, ?, ?, ?, ?, ?)",
      [
        values.time,
        values.freq,
        values.lat,
        values.long,
        values.alt,
        values.act,
      ],
      (err) => {
        if (err) {
          console.log("insert : ERROR", err);
        }
      }
    );
  }

  delete(key, callback) {
    return this.db.run("DELETE from Data WHERE time = ?", [key], (err) => {
      if (err) {
        console.log("delete : ERROR", err);
      }
    });
  }

  findAll(callback) {
    return this.db.run("SELECT * FROM Data", (err) => {
      if (err) {
        console.log("findAll : ERROR", err);
      }
    });
  }

  findByKey(key, callback) {
    return this.db.run("SELECT * FROM Data WHERE time = ?", [key], (err) => {
      if (err) {
        console.log("findAll : ERROR", err);
      }
    });
  }
}

module.exports = ActivityEntryDAO;
