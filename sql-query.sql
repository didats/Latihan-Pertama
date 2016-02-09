TRUNCATE TABLE angkot
DELETE FROM angkot

SELECT * FROM angkot
SELECT * FROM angkot WHERE angkot_price=4000
SELECT * FROM angkot WHERE angkot_price<=4000

INSERT INTO angkot(angkot_name, angkot_desc, angkot_price) VALUES('AL', 'AL', '3300')
INSERT INTO angkot SET angkot_name = 'ABG', angkot_desc = 'ABG', angkot_price = '3400'

UPDATE angkot SET angkot_price = '3800' WHERE angkot_name = 'CKL'
UPDATE angkot SET angkot_desc = 'Angkot AL', angkot_price = '3500' WHERE angkot_name = 'AL'