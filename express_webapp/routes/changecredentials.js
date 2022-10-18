const express = require("express");
const router = express.Router();
const user_dao = require("../../sport-track-db/sport-track-db").user;

var sess;

router.get("/", function (req, res, next) {
  sess = req.session;

  res.render("changecredentials", {
    lastname: sess.user.lastname,
    firstname: sess.user.firstname,
    dob: sess.user.dob,
    gender: sess.user.gender,
    height: sess.user.height,
    weight: sess.user.weight,
    email: sess.user.email,
    pwd: sess.user.pwd,
  });
});

router.post("/", function (req, res, next) {
  sess = req.session;

  let n = req.body.lastname;
  let p = req.body.firstname;
  let d = req.body.dob;

  if (req.body.genderM == "on") {
    var s = "M";
  } else {
    var s = "F";
  }

  let t = req.body.height;
  let pd = req.body.weight;
  let e = req.body.email;
  let m = req.body.pwd;

  user_dao.update(
    [sess.user.email],
    {
      nom: n,
      prenom: p,
      dob: d,
      gender: s,
      height: t,
      weight: pd,
      email: e,
      pwd: m,
    },
    (err) => {
      if (err) {
        console.log(err);
        res.redirect("/changecredentials");
        // throw err;
      } else {
        console.log("The user information was updated successfully");
        res.redirect("/logout");
      }
    }
  );
});

module.exports = router;
