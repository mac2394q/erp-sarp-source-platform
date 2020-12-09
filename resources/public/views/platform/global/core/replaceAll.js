function replaceAll(text) {
  //text=text.replace(/\./g,"");
  //text=text.replace(/\$/g,"");
  text = text.replace(/[^a-z0-9]/gi, '');
  return text;
}
