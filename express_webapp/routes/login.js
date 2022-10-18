const express = require("express");
const router = express.Router();
const user_dao = require("../../sport-track-db/sport-track-db").user;

var sess;

router.get("/", function (req, res, next) {
  res.render("login", {});
});

router.post("/", function (req, res, next) {
  sess = req.session;

  user_dao.findByKey([req.body.email], (err, rows) => {
    if (err) {
      console.log(err);
      res.redirect("/login_false");
      // throw err;
    } else {
      if (rows != null) {
        if (rows.mdp == req.body.pwd) {
          let user = {
            lastname: rows.nom,
            firstname: rows.prenom,
            dob: rows.dateDeNaissance,
            gender: rows.sexe,
            height: rows.taille,
            weight: rows.poids,
            email: rows.email,
            pwd: rows.mdp,
          };

          sess.user = user;

          console.log(sess);
          console.log("Login successful");
          res.redirect("/homepage");
        } else {
          console.log("Login failed");
          res.redirect("/login_false");
        }
      } else {
        console.log("Login failed");
        res.redirect("/login_false");
      }
    }
  });
});

module.exports = router;
