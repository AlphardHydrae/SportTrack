const sqlite3 = require("sqlite3");

class SqliteConnection {
  constructor() {
    this.db = new sqlite3.Database("data/sport_track.db", (err) => {
      if (err) {
        console.log("Database unreachable", err);
      } else {
        console.log("Database connected");
      }
    });

    return this.db;
  }
}

let connection = new SqliteConnection();
module.exports = connection;
