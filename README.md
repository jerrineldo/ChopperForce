

# ChopperForceFive
An HR application developed for the us army.
## To do
- [x] Setup database
- [x] Complete features
- [ ] Organize file structure
- [ ] Testing

#
# Features and Discriptions

**Asia Levesque Gault:** 

Homepage, Header, Nav, Footer, OER(Feature 1), NCOER(Feature 2), Pie Chart(Feature 3).

Home Page, Header, Nav and Footer:

The Home page was created to house different features all of which would facilitate information flow to the user. The home page gives a snap shot of the organizations strengths and shortcomings. I created and included a pie chart to visualize the organization capacity strength. In the future I would create a pie Chart for Weapons Qualification, and the Physical Fitness report results. This would allow the commanding officer to monitor his organization and see where the short comings reside. From the Home page the user can easily naavigate to view the organization's reports.  

OER & NCOER: 

The OER & NCOER page has full CRUD functionality. An OER & NCOER is similar to a report card. These two pages will track upcoming due OER & NCOER, who rated a soldier, and the scores of past OER & NCOER. Both OER & NCOER use their models to pull information from the db tables: users, enlisted_reportcards and officer_reportcards and pass that to the views. 



**Jerrin Eldo Mazhuvancherry:** Login

**Luis Botello:** Company List (Interface, Read, Update), Business logic for OER/NCOER overdue alerts on front-page, Accounts model, and user details

**Journey Gault:** Awards Report(full CRUD), Duties Report(full CRUD), 3d feature is  OER Alerts, NCOER Alerts and Roster on the home page. Roster is number of soldiers by rank, and the oer alerts and ncoer alerts, show ALL upcoming NCOER and OER reports that are due in the next 30 days. This third feature was an attempt to create a sort of "At a glance" view for the users.

**Praveen Ramkumar:** family-contact (create, read, update, delete, search),emergency contact (create, read, update, delete, search), weapons (read, delete), weapons-qualificaion (read, update, delete), Hosted DB on Server

