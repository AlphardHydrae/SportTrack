const db_connection = require("./sport-track-db").db_connection;
const user_dao = require("./sport-track-db").user_dao;

function main() {
  let db = new SqliteConnection();
  let user = new UserDAO(db);

  user.findAll((err, rows) => {
    if (err) {
      throw err;
    }
    rows.forEach((row) => {
      console.log(row.name);
    });
  });
}

main();
