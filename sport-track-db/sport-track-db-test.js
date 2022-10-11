const db_connection = require("./sport-track-db").db;
const user_dao = require("./sport-track-db").user;
const activity_dao = require("./sport-track-db").activity;
const activity_entry_dao = require("./sport-track-db").activity_entry;

function main() {
  user_dao.findAll((err, rows) => {
    if (err) {
      throw err;
    }
    console.log("UserDAO test");
    console.log(rows);
  });

  // user_dao.insert(
  //   {
  //     nom: "user",
  //     prenom: "user",
  //     dob: "2022-10-11",
  //     gender: "A",
  //     height: 180,
  //     weight: 70,
  //     email: "user@gmail.com",
  //     pwd: "userPWD",
  //   },
  //   (err) => {
  //     if (err) {
  //       throw err;
  //     }
  //   }
  // );

  // user_dao.findAll((err, rows) => {
  //   if (err) {
  //     throw err;
  //   }
  //   console.log(rows);
  // });

  // user_dao.delete("user@gmail.com", (err) => {
  //   if (err) {
  //     throw err;
  //   }
  // });

  // user_dao.findAll((err, rows) => {
  //   if (err) {
  //     throw err;
  //   }
  //   console.log(rows);
  // });

  activity_dao.findAll((err, rows) => {
    if (err) {
      throw err;
    }
    console.log("ActivityDAO test");
    console.log(rows);
  });

  activity_entry_dao.findAll((err, rows) => {
    if (err) {
      throw err;
    }
    console.log("ActivivtyEntryDAO test");
    console.log(rows);
  });
}

main();
