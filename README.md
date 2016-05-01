# com_comets

com_comets is a Joomla 3 component for entering comet observations for [ASO](http://arksky.org) -  Arkansas Sky Observatories 

### Version
1.0

### Tech
Troy "Bear" Hall

### Software Used
com_comet uses a number of open source projects to work properly:
* [Twitter Bootstrap](http://getbootstrap.com/) - great UI boilerplate for modern web apps
* [jQuery](https://jquery.com/) - cool manipulation system
* [Joomla!](http://joomla.org/ "Joomla 3.x for layout , data entry & control") - Joomla 3.x for layout , data entry & control

### Installation
Simply install like any other Joomla! extension.


### Files...
the file "comets-seen.csv" is the original csv from which we are starting.  It has several problems.
"observations-date.php" is a converter that takes the "comets-seen.csv" and turns it into a more useable .csv with correct headers and data.
"rebuilt-observations.csv" is the generated output.  I believe the double quotes created by line
84 of "observations-date.php" can be bypassed but in using the .csv to sql converter online It's had to 
be there to get a valid readout.

### Field notes...
The *image* field should be a media manager image.
*Observer* field should be users "name" as known in astrological world.  ( probably not the same as real name or user name ) ( perhaps a automatic alias?)
the *location* should be from a specified list of observatories.
*Comments* should probably be a editor field.
*timestamp* should be a automatic time of the data entered in ( Astronomy format is YYYYMMDD HH )
*date* should be a calendar field ( we might be able to remove it later - but its inference is the actual date of the observation )
I'm not sure of the validation of other fields at this time, nor their max length but I will try to gather that info.


### Usage
The component needs to generate at least 3 views.

1) a *last Observed* listing of every comet observed and should be filterable.  Sortable by date or comet is important.  Might be nice to have a *total* column for the count of all observations of that comet

2) a listing of each observation by comet.

3) Single entry view with full size image.

ability to have a gallery of observation images might be nice with link back or modal to the entry.

### CRITICAL ITEMS.
anyone can view the entries, but only specified users can enter data.  To simplify matters the image folder used should be restricted to ONLY the one allowed...
for example... 
*/images/observations/comets* would be the root and then each comet would be a sub-folder using the name of the comet I guess...
so when they go to enter a image for comet *104P Kowal* it would automatically put the image in the */images/observations/comets/104P-Kowal* folder.
This forced location of images is not mandatory but would be helpful.  Possibility for duplicate image names does exist but is remote.


### Reason for this component
[Arkansas Sky Observatory](http://arksky.org) has been donating their services to the astronomy world for decades.  They get zero funding from any source
other then Doc Clays personal retirement.  Their original site was designed in perl back in 2001 and most of the code used
is either obsolete already, or will soon be with the advent of php 7.  They suffered a major data loss a few years ago and have
not been able to rebuild due to the numerous issues.  Everything up to now has either been in flat files, or in a 
mixture of formats.
ASO provides a lot of important data back to major centers like Harvard and Minor Planet so I would like to help
them be strong once again.



