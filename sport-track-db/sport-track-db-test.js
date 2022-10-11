const db_connection = require("./sport-track-db").db;
const user_dao = require("./sport-track-db").user;
const activity_dao = require("./sport-track-db").activity;
const activity_entry_dao = require("./sport-track-db").activity_entry;

function main() {
  user_dao.findAll((err, rows) => {
    if (err) {
      throw err;
    }
    console.log(rows);
  });

  activity_dao.findAll((err, rows) => {
    if (err) {
      throw err;
    }
    console.log(rows);
  });

  activity_entry_dao.findAll((err, rows) => {
    if (err) {
      throw err;
    }
    console.log(rows);
  });
}

main();
