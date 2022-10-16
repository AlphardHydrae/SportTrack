const createError = require("http-errors");
const express = require("express");
const session = require("express-session");
const path = require("path");
const cookieParser = require("cookie-parser");
const logger = require("morgan");

const indexRouter = require("./routes/index");
// const usersRouter = require("./routes/users");
const loginRouter = require("./routes/login");
const signupRouter = require("./routes/signup");
const homepageRouter = require("./routes/homepage");
const changecredentialsRouter = require("./routes/changecredentials");

const app = express();

app.set("views", path.join(__dirname, "views"));
app.set("view engine", "pug");

app.use(logger("dev"));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, "public")));
app.use(session({ secret: "secret", saveUninitialized: true, resave: true }));

app.use("/", indexRouter);
// app.use('/users', usersRouter);
app.use("/login", loginRouter);
app.use("/signup", signupRouter);
app.use("/homepage", homepageRouter);
app.use("/changecredentials", changecredentialsRouter);

app.use(function (req, res, next) {
  next(createError(404));
});

app.use(function (err, req, res, next) {
  res.locals.message = err.message;
  res.locals.error = req.app.get("env") === "development" ? err : {};

  res.status(err.status || 500);
  res.render("error");
});

module.exports = app;
