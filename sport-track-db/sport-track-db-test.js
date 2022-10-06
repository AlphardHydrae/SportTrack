const db_connection = require("./sport-track-db").db_connection;
const user_dao = require("./sport-track-db").user_dao;
const activity_dao = require("./sport-track-db").activity_dao;
const activity_entry_dao = require("./sport-track-db").activity_entry_dao;

function main() {
  user_dao.findAll((err, rows) => {
    if (err) {
      throw err;
    }
    rows.forEach((row) => {
      console.log(row.name);
    });
  });
}

main();
