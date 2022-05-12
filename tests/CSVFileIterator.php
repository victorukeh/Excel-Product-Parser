class CsvFileIterator implements Iterator
{
protected $file;
protected $key = 0;
protected $current;

public function __construct($file)
{
$this->file = fopen($file, 'r');
}

public function __destruct()
{
fclose($this->file);
}

public function valid()
{
return !feof($this->file);
}

public function current()
{
return $this->current;
}

public function next()
{
$this->current = fgetcsv($this->file);
$this->key++;
}
}