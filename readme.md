
# Clinic Network

## User Story 

Imagine that we need to create an application for a fictitious clinic in Montreal and we need to pull upcoming appointments booked by one of the clinics in their network (Ferry-Zemlak). The clinic uses XML endpoint with Basic authentication. 

You need to make a system which will pull appointments from the XML API (including doctor, specialty and patient information) and store them in the database. The system should import appointments once per day and it should import appointments for one month in advance, but should not import canceled appointments. 

Front end should display only one page where we can select a doctor and a date and it should display appointments of the chosen doctor on the chosen date, along with the appointment start time and specialty name. If there are no appointments, we shouldn’t be able to select the date. If logged out, it shouldn’t display appointment of minors (patients under the age of 18). If logged in, it should display all appointments.  