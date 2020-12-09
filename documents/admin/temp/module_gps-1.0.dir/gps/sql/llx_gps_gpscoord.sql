-- Copyright (C) 2018      Jean-François Ferry 	<hello+jf@librethic.io>
--
-- This program is free software: you can redistribute it and/or modify
-- it under the terms of the GNU General Public License as published by
-- the Free Software Foundation, either version 3 of the License, or
-- (at your option) any later version.
--
-- This program is distributed in the hope that it will be useful,
-- but WITHOUT ANY WARRANTY; without even the implied warranty of
-- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
-- GNU General Public License for more details.
--
-- You should have received a copy of the GNU General Public License
-- along with this program.  If not, see http://www.gnu.org/licenses/.


CREATE TABLE llx_gps_gpscoord(
	-- BEGIN MODULEBUILDER FIELDS
	rowid integer AUTO_INCREMENT PRIMARY KEY NOT NULL, 
	entity integer DEFAULT 1 NOT NULL,
	label  varchar(128) NULL,
	fk_element integer NOT NULL, 
	elementtype varchar(32) NOT NULL, 
	lat decimal(10,8) NOT NULL, 
	lng decimal(10,8) NOT NULL
	-- END MODULEBUILDER FIELDS
) ENGINE=innodb;