
DROP TABLE IF EXISTS recycling_center;

CREATE TABLE recycling_center (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(200) NOT NULL,
    material_recycled VARCHAR(200) NOT NULL,
    latitude DECIMAL(10, 8) NOT NULL,
    longitude DECIMAL(10, 8) NOT NULL
);

INSERT INTO recycling_center (name, address, material_recycled, latitude, longitude) VALUES
('Aluminum Recycling', '2412 S Elm-Eugene St. Greensboro, NC 27406', 'Aluminum, Plastic, Paper', 36.04388, -79.79174),
('ReCommunity Greensboro', '706 Patton Ave, Greensboro, NC 27406', 'Plastic, Metal, Aluminum', 36.04194, -79.77545),
('Greensboro Recycling', '2300 W Meadowview Rd #207 Greensboro, NC 27407', 'Aluminum, Electronics, Metal, Plastic', 36.05143, -79.84160),
('J & M Recycling', '2307 W Cone Blvd #180, Greensboro, NC 27408', 'Aluminum', 36.11063, -79.82725),
('Gate City Recycling', '610 Industrial Ave, Greensboro, NC 27406', 'Aluminum', 36.02768, -79.77424),
('A & A Recycling', '3934 Hahns Ln, Greensboro, NC 27401', 'Aluminum', 36.07986, -79.74060),
('Cardinals Metals LLC', '5149 Randleman Rd, Greensboro, NC 27406', 'Aluminum', 36.93220, -79.81101),
('Salvage America', '3001 Holts Chapel Rd, Greensboro, NC 27401', 'Aluminum', 36.07792, -79.75260),
('Boom Recycling', '717 Green Valley Rd Suite 200, Greensboro, NC 27408', 'Aluminum', 36.09513, -79.82247),
('ARC', '2091 Bishop Rd, Greensboro, NC 27406', 'Aluminum', 36.99517, -79.84645),
('Securis', '1108 N. O.Henry Blvd, Greensboro, NC 27405', 'Aluminum', 36.08940, -79.76568),
('Piedmont Paper Stock Co', '3909 Riverdale Rd, Greensboro, NC 27406', 'Aluminum', 36.01555, -79.77916),
('D.H. Griffin Wrecking Co., Inc. - Scrap Yard', '4700 Hilltop Rd, Greensboro, NC 27406', 'Aluminum', 36.03919, -79.88258),
('Forsyth County Recycling Center', 'Pfafftown, NC 27040', 'Aluminum', 36.17918, -80.40765),
('Recycling Station', '325 W Hanes Mill Rd, Winston-Salem, NC 27105', 'Aluminum', 36.19798, -80.28614),
('The 3RC EnviroStation', '1401 S Martin Luther King Jr Dr, Winston-Salem, NC 27107', 'Aluminum', 36.09091, -80.22327),
('WM - Winston-Salem Recycle Center', '280 Business Park Dr, Winston-Salem, NC 27107', 'Aluminum', 36.04984, -80.15667),
('Sonoco Recycling', '4175 N Glenn Ave, Winston-Salem, NC 27105', 'Aluminum', 36.15470, -80.23083),
('Recycle America of The Piedmont', '1330 Ivy Ave, Winston-Salem, NC 27105', 'Aluminum', 36.12253, -80.23975),
('Reflective Recycling Inc', '3380 Old Lexington Rd #2, Winston-Salem, NC 27107', 'Aluminum', 36.06372, -80.22396),
('leisure time recycling', '1801 Ivy Ave, Winston-Salem, NC 27105', 'Aluminum', 36.13141, -80.23701),
('Hanes Mill Road Solid Waste Facility', '325 W Hanes Mill Rd, Winston-Salem, NC 27105', 'Plastic', 36.19635, -80.28037),
('Abbey Green (DBA A-1 Service Group)', '5030 Overdale Rd, Winston-Salem, NC 27107', 'Copper', 36.04818, -80.23220),
('OmniSource Corporation', '1426 W Mountain St, Kernersville, NC 27284', 'Metal',36.13971, -80.10225),
('Industrial Electronic Recycling', '1381 S Park Dr Q, Kernersville, NC 27284', 'Electronics', 36.10989, -80.06505),
('Kernersville Town Recycling', '720 Mckaughan St, Kernersville, NC 27284', 'Metal', 36.11444, -80.06988),
('Feest-Ferry', '652 Gralin St, Kernersville, NC 27284', 'Plastic', 36.12082, -80.06026),
('Piney Hill Acres', '2020 Piney Grv Rd, Kernersville, NC 27284', 'Plastic', 36.17710, -80.06146),
('Rural Garbage Services', '2838, 302 E Bodenhamer St Suite B, Kernersville, NC 27284', 'Metal', 36.12276, -80.06850),
('ecoATM', '1130 S Main St, Kernersville, NC 27284', 'Electronics', 36.11379, -80.10047);
