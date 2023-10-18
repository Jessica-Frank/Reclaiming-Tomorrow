
DROP TABLE IF EXISTS recycling_center;

CREATE TABLE recycling_center (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(200) NOT NULL,
    material_recycled VARCHAR(200) NOT NULL,
    latitude DECIMAL(10, 8) NOT NULL,
    longitude DECIMAL(10, 8) NOT NULL
);

DROP TABLE IF EXISTS search_query;

CREATE TABLE search_query (
    id INT AUTO_INCREMENT PRIMARY KEY,
    recycling_material VARCHAR(100) NOT NULL,
    current_location VARCHAR(100) NOT NULL,
    distance DECIMAL(5, 2) NOT NULL
);

INSERT INTO recycling_center (name, address, material_recycled, latitude, longitude) VALUES
('Aluminum Recycling', '2412 S Elm-Eugene St. Greensboro, NC 27406', 'Aluminum', 36.04388, -79.79174),
('ReCommunity Greensboro', '706 Patton Ave, Greensboro, NC 27406', 'Aluminum', 36.04194, -79.77545),
('Greensboro Recycling', '2300 W Meadowview Rd #207 Greensboro, NC 27407', 'Aluminum', 36.05143, -79.84160),
('J & M Recycling', '2307 W Cone Blvd #180, Greensboro, NC 27408', 'Aluminum', 36.11063, -79.82725),
('Gate City Recycling', '610 Industrial Ave, Greensboro, NC 27406', 'Aluminum', 36.02768, -79.77424),
('A & A Recycling', '3934 Hahns Ln, Greensboro, NC 27401', 'Aluminum', 36.07986, -79.74060),
('Cardinals Metals LLC', '5149 Randleman Rd, Greensboro, NC 27406', 'Aluminum', 36.93220, -79.81101),
('Salvage America', '3001 Holts Chapel Rd, Greensboro, NC 27401', 'Aluminum', 36.07792, -79.75260),
('Boom Recycling', '717 Green Valley Rd Suite 200, Greensboro, NC 27408', 'Aluminum', 36.09513, -79.82247),
('ARC', '2091 Bishop Rd, Greensboro, NC 27406', 'Aluminum', 36.99517, -79.84645),
('Securis', '1108 N. O.Henry Blvd, Greensboro, NC 27405', 'Aluminum', 36.08940, -79.76568),
('Piedmont Paper Stock Co', '3909 Riverdale Rd, Greensboro, NC 27406', 'Aluminum', 36.01555, -79.77916),
('D.H. Griffin Wrecking Co., Inc. - Scrap Yard', '4700Hilltop Rd, Greensboro, NC 27406', 'Aluminum', 36.03919, -79.88258);

INSERT INTO search_query (recycling_material, current_location, distance) VALUES
()