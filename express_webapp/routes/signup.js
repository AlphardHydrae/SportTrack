const express = require("express");
const router = express.Router();
const user_dao = require("../../sport-track-db/sport-track-db").user;

var sess;

router.get("/", function (req, res, next) {
  res.render("signup", {});
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

  user_dao.insert(
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
        res.redirect("/signup");
        console.log(err);
        // throw err;
      } else {
        sess.user = {
          lastname: n,
          firstname: p,
          dob: d,
          gender: s,
          height: t,
          weight: pd,
          email: e,
          pwd: m,
        };

        console.log(sess);
        console.log("The account was created successfully");
        res.redirect("/homepage");
      }
    }
  );
});

module.exports = router;
