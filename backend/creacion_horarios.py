import mysql.connector

horas_inicio = ["07:00:00", "08:45:00", "10:30:00", "12:15:00", "14:00:00"]
horas_fin = ["08:30:00", "10:15:00", "12:00:00", "13:45:00", "15:30"]
salones = ["SALON A", "SALON B", "SALON C", "SALON D", "SALON E", "SALON F"]
dias = [1, 2]

db = mysql.connector.connect(
    host = "localhost",
    user = "root",
    password = "root",
    database = "escomingreso"
)

cursor = db.cursor()

# INSERTANDO HORARIOS

for dia in dias:
    for pos in range(len(horas_inicio)):
        for salon in salones:
            sql = "insert into horarios (hora_inicio, hora_fin, salon, dia, lugares_ocupados, capacidad_max, disponible) values (%s, %s, %s, %s, %s, %s, %s)"
            val = (horas_inicio[pos], horas_fin[pos], salon, dia, 0, 25, 1)
            cursor.execute(sql, val)

db.commit()