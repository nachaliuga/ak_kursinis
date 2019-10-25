<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogPostRepository")
 */
class BlogPost
{

    public const blogPostImagesUploadFolder = '/uploads/blog_post/images/';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $subject;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagePath;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="blogPosts")
     */
    private $category;

    /**
     * @Assert\NotBlank(message="Nuotrauka turi buti ikelta Jpeg formatu.")
     * @Assert\File(mimeTypes={"image/jpeg", "image/png"})
     */
    private $uploaded_image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageTitle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): self
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getUploadedImage()
    {
        return $this->uploaded_image;
    }
    public function setUploadedImage( $uploaded_image): self
    {
        $this->uploaded_image = $uploaded_image;

        return $this;
    }

    public function getImageTitle(): ?string
    {
        return $this->imageTitle;
    }

    public function setImageTitle(?string $imageTitle): self
    {
        $this->imageTitle = $imageTitle;

        return $this;
    }
}
