# Gameinc

Gameinc is an aplication that contains information from a collection of video games. This aplication implements the concept of semantics in the form of a search engine and the dataset is created using RDF. User can simply search for a video game and the aplication will return a list of video games that matched user's input.

## Getting Started

### Dependencies
* Apache Jena Fuseki
* Ngrok
* PHP
* XAMPP

### Installing
1. Install all dependencies
2. Clone repo to (/xampp/htdocs)
```
git clone https://github.com/ankiprawira/game.inc
```
3. Run Apache Jena Fuseki Server
```
fuseki-server
```
4. Run Ngrok
```
ngrok http 3030
```
5. Add [dataset.ttl](/src/sparql/dataset.ttl) to Apache Jena Fuseki with /gaminc dataset name format
```
http://localhost:3030/
```

### Executing program

1. Start XAMPP
2. Open localhost on local browser
```
http://localhost/gaminc
```

## Authors

Contributors names and contact info

Anki Prawira Hidayat<br>
Github : [Anki Prawira](https://github.com/ankiprawira)


## License

This project is licensed under the [Anki Prawira](https://github.com/ankiprawira) License - see the LICENSE.md file for details
