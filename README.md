# contao-la-subpagecheck
Contao insert tag to check if the page has sub pages

## usage
```
{{has_subpage::<page id>}}
```
To get it for the current page use:
```
{{has_subpage::{{page::id}} }}
```

Will return
```
true
```
or
```
false
```

