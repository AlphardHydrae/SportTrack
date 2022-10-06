const sqlite3 = require("sqlite3");

class SqliteConnection {
  constructor() {
    this.db = new sqlite3.Database("../data/sport_track.db", (err) => {
      if (err) {
        console.log("Database unreachable", err);
      }
      console.log("Database connected");
    });
  }
}

let connection = new SqliteConnection();
module.exports = connection;
