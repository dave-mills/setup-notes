## Dataset Tracker - Comments
I think the core functions of the platform work very well and do exactly what we need to help us manage and track usage of datasets for different projects. The ability to automatically pull in project and client data from FreeAgent and the ease of moving from the projects list to viewing datasets for a single project make this a very useful tool.
'#'
When reviewing it, I found there were places where it's not immediately clear what users should do, or where / how to navigate to do different things. The tweaks I've suggested below are a combination of: 
 - label changes - to add extra information for the users
 - some streamlining of functions, particulary around managing the 'versions' of different datasets.

### Minor tweaks (mainly labels and page text)
Projects page: 
 - change the label of the datasets button to 'View Datasets'.
 - change the label of the 'sync' button to 'Sync projects from FreeAgent'.

Clients page:
 - change the label of the 'sync' button to 'Sync clients from FreeAgent'.

Datasets:
 - When adding / editing a dataset: 
   - Update the "Name folder" field label to "Dataset Name".
   - Add a `hint` property to the "Name folder" field to give extra info to users. For example: "make this a recognisable name for others working on the project".

### Dataset Downloads
 
 - Theres a minor bug with the donwloader. When a dataset contains multiple files, the downloaded zip only contains the first file.
 - When a user downloads a dataset, it's not immediately clear that a new version record has been created. For now, I suggest:
     + Remove the 'File' column to make some space.
     + Add a 'number of downloads' column to the table. You could use a model function, e.g. that returns `return $this->versions()->count();`. 
     + Update the "Download" button label to "Download new version".


### Version handling:
 - Remove the 'Add version' button from the /admin/version page to prevent manual creation of new versions.
 - Add an automatic filter to only show 'versions' of datasets from projects that the user is assigned to. (In the same way that you can only see datasets from projects you are assigned to).
 - Add a user-controlled 'projects' filter - same as for the datasets page.
 - Add a user-controlled filter to let the user display only versions that they created.
 - Change the "File" column to show the Dataset "folder_name" field. (I think that would be clearer, especially for datasets with multiple files).

I think the only things a user needs to edit in a 'version' record are the status and comment so:
 - change the 'edit' button label to 'Update status'
 - remove the fields 'User Name', and 'Date Download'.
 - change the "status" column to be a list of options:
     + 'in use'
     + 'deleted'
- for now, remove the "delete" button entirely. (In the future, we can update this to use 'soft' deletes, but for now I think we should prevent users from deleting the record from the database entirely).

### File Manager:
 - This looks very useful for testing and debugging, but I don't think it should be available to users in the live version. Can you add a condition to prevent any non-admin user from accessing this?


### Extra Notes from meeting

- Add option for user to request access to a project - this should automatically send an email to the main admin(s).
- When a dataset is deleted, remove the actual files.
- Prevent datasets from being deleted if a 'version' of the dataset is still in use
- Add the ability for users to add an avatar
- Add an 'admin' column to users - admins have full access to all projects.

