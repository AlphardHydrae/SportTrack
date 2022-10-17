const express = require("express");
const router = express.Router();
const user_dao = require("../../sport-track-db/sport-track-db").user;

var sess;

router.get("/", function (req, res, next) {
  res.render("login", { incorrect: "" });
});

router.post("/", function (req, res, next) {
  sess = req.session;

  user_dao.findByKey([req.body.email], (err, rows) => {
    if (err) {
      throw err;
    }

    if (rows != null) {
      let user = rows;

      if (user.mdp == req.body.pwd) {
        sess.user = user;

        console.log("Login successful");
        res.redirect("/homepage");
      } else {
        res.render("login", {
          incorrect: "le nom d'utilisateur ou le mot de passe est incorrect",
        });

        console.log("Login failed");
      }
    }
  });
});

module.exports = router;
