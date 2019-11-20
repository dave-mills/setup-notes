# Sublime Text - Setup
Things to make Sublime nicer to use:


## Core:

- Open your entire working directory into Sublime (probably the github project, or R-Shiny project folder), not just individual files.

- **ctrl-p / cmd-p**: Brings up the file-search box. Start typing a file or folder path, and it searches through your entire working directory. Uses Partial Matching so you don't need to type the full path to the file to open it.
 - When in this search, use @ to switch to searching for named functions within the file. 

- **ctrl-shift-p / cmd-shift-p**: Brings up the command pallate. Type to search through the list of available commands (including ones from installed packages).

- Install the Package manager. This is needed to install any other package: https://packagecontrol.io/installation 

## Use Projects to quickly switch between different pieces of work
1. Save the project (Project -> Save Project As). This creates a sublime project file and assigns your current window to it.

2. Opened project folders and open files will be persisted - so when you come back to the project, it'll be exactly as you left it.

3. Quick switch between projects with **Ctrl-Alt-P / Ctrl-Cmd-P**.
 - This apparently isn't default on Windows. To enable it, go to Preferences -> Key bindings and add the following to the user settings:
    `{ "keys": ["ctrl+alt+p"], "command": "prompt_select_workspace" }`

NOTE: The project 'state' (currently open folders and files) is automatcially stored, so if you want to make a new project, do save-as **first**, then open new folders and close the old ones. (Feels a bit counter-intuitive for me)

## Setup keyboard shortcuts for common things:
My Setup: (to use, go to Preferences -> Keybindings and put any of these json snippets into the User .sublime-keymap file)

- `{ "keys": ["ctrl+i"], "command": "reindent" }` <- lets me quickly fix indentation to tidy code.
- `{ "keys": ["ctrl+f10"], "command": "clone_file" }` <- quickly duplicate the current file.
-``` 
  {
    "keys": ["ctrl+shift+`"], "command": "terminus_open", "args": {
      "config_name": "Zsh",
      "panel_name": "Terminus"
    }
  }
```  
    - opens a new terminus window, using Zsh (For most Mac / Linux setups, use Bash. For Windows, use Command Prompt or Powershell)
- ```
    { "keys": ["ctrl+`"], "command": "toggle_terminus_panel"}
    ``` <- toggles the current terminus window open or closed.
- `{ "keys": ["ctrl+pageup"], "command": "find_use"}`,
- `{ "keys": ["f7"], "command": "insert_php_constructor_property"}`,
- `{ "keys": ["ctrl+tab"], "command": "next_view" }`,
- `{ "keys": ["ctrl+shift+tab"], "command": "prev_view" }`,
- `{ "keys": ["alt+left"], "command": "terminus_keypress", "args": {"key": "b", "alt": true}, "context": [{"key": "terminus_view"}] }`,
- `{ "keys": ["alt+right"], "command": "terminus_keypress", "args": {"key": "f", "alt": true}, "context": [{"key": "terminus_view"}] }`,
