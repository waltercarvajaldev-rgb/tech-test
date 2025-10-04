const express = require('express');
const cors = require('cors');
const app = express();
app.use(cors());
app.use(express.json());
app.post('/event/completed', (req, res) => {
    console.log('Tarea completada:', req.body);
    res.json({ message: 'Email enviado (simulado)' });
});
app.listen(3000, () => console.log('Node en 3000'));