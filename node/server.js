const path = require("path");
const express = require("express");
const helmet = require("helmet");
const compression = require("compression");

const app = express();
app.disable("x-powered-by");
const port = process.env.PORT || 3000;

app.set("view engine", "ejs");
app.set("views", path.join(__dirname, "views"));

app.use(
  helmet({
    contentSecurityPolicy: {
      useDefaults: true,
      directives: {
        "default-src": ["'self'"],
        "img-src": ["'self'", "data:"],
        "style-src": ["'self'"],
        "script-src": ["'self'"]
      }
    },
    referrerPolicy: { policy: "strict-origin-when-cross-origin" }
  })
);

app.use(compression());
app.use(express.urlencoded({ extended: false }));
app.use(express.static(path.join(__dirname, "public"), { maxAge: "4h" }));

const defaultValues = {
  nombre: "",
  apellido: "",
  dpi: "",
  nacimiento: "",
  sexo: "M",
  usuario: ""
};

app.get("/", (req, res) => {
  res.render("index", { values: defaultValues, errors: {}, submitted: false });
});

app.post("/registro", (req, res) => {
  const fields = { ...defaultValues };
  const errors = {};

  Object.keys(fields).forEach((key) => {
    const trimmed = (req.body[key] || "").toString().trim();
    fields[key] = trimmed;
    if (!trimmed) {
      errors[key] = "Este campo es obligatorio";
    }
  });

  const password = (req.body.contrasena || "").toString();
  if (!password) {
    errors.contrasena = "La contraseña es obligatoria";
  }

  if (fields.dpi && !/^[0-9]{4}[- ]?[0-9]{5}[- ]?[0-9]{4}$/.test(fields.dpi)) {
    errors.dpi = "DPI no tiene el formato esperado";
  }

  if (Object.keys(errors).length > 0) {
    res.status(400).render("index", {
      values: fields,
      errors,
      submitted: false
    });
    return;
  }

  const maskPassword = "*".repeat(Math.max(password.length, 8));

  res.render("registro", {
    values: fields,
    maskedPassword: maskPassword
  });
});

app.use((req, res) => {
  res.status(404).render("404", { path: req.originalUrl });
});

app.listen(port, () => {
  console.log(`Servidor escuchando en http://localhost:${port}`);
});
