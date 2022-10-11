const db_connection = require("./sqlite_connection");

class ActivityEntryDAO {
  constructor() {
    this.db = db_connection;
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
      function (err) {
        if (err) {
          callback("insert : ERROR");
        } else {
          callback(null);
        }
      }
    );
  }

  delete(key, callback) {
    return this.db.run(
      "DELETE from Data WHERE time = ?",
      [key],
      function (err) {
        if (err) {
          callback("delete : ERROR");
        } else {
          callback(null);
        }
      }
    );
  }

  findAll(callback) {
    return this.db.all("SELECT * FROM Data", function (err, rows) {
      if (err) {
        callback("findAll : ERROR", null);
      } else {
        callback(null, rows);
      }
    });
  }

  findByKey(key, callback) {
    return this.db.get(
      "SELECT * FROM Data WHERE time = ?",
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

let activity_entry = new ActivityEntryDAO();
module.exports = activity_entry;
