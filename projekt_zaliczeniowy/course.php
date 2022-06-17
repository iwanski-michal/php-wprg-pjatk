<?php
class course {
public $courseName;
public $courseDescription;
public $courseDifficulty;
public $courseTaskCount;
public array $tasks;
function __construct($name, $description, $difficulty, $taskCount = 0, $tasks = []){
    $this->courseName = $name;
    $this->courseDescription = $description;
    $this->courseDifficulty = $difficulty;
    $this->courseTaskCount = $taskCount;
    $this->tasks = $tasks;
}
public function serialize()
{
    return $this->serialize();
}
public function unserialize()
{
    return $this->unserialize();
}
    /**
     * @return mixed
     */
    public function getCourseName()
    {
        return $this->courseName;
    }

    /**
     * @param mixed $courseName
     */
    public function setCourseName($courseName): void
    {
        $this->courseName = $courseName;
    }

    /**
     * @return mixed
     */
    public function getCourseDescription()
    {
        return $this->courseDescription;
    }

    /**
     * @param mixed $courseDescription
     */
    public function setCourseDescription($courseDescription): void
    {
        $this->courseDescription = $courseDescription;
    }

    /**
     * @return mixed
     */
    public function getCourseDifficulty()
    {
        return $this->courseDifficulty;
    }

    /**
     * @param mixed $courseDifficulty
     */
    public function setCourseDifficulty($courseDifficulty): void
    {
        $this->courseDifficulty = $courseDifficulty;
    }

    /**
     * @return int|mixed
     */
    public function getCourseTaskCount()
    {
        return $this->courseTaskCount;
    }

    /**
     * @param int|mixed $courseTaskCount
     */
    public function setCourseTaskCount($courseTaskCount): void
    {
        $this->courseTaskCount = $courseTaskCount;
    }

    /**
     * @return array
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @param array $tasks
     */
    public function setTasks(array $tasks): void
    {
        $this->tasks = $tasks;
    }

}

