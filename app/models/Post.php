<?php

/**
 * Post
 *
 * @property-read \User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\Comment[] $comments
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Post whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Post whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Post whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\Post whereSlug($value) 
 * @method static \Illuminate\Database\Query\Builder|\Post whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\Post whereMetaTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\Post whereMetaDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\Post whereMetaKeywords($value) 
 * @method static \Illuminate\Database\Query\Builder|\Post whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Post whereUpdatedAt($value) 
 */
use Illuminate\Support\Facades\URL;

class Post extends Eloquent {
	/**
	 * Deletes a blog post and all
	 * the associated comments.
	 *
	 * @return bool
	 */
	public function delete()
	{
		// Delete the comments
		$this->comments()->delete();

		// Delete the blog post
		return parent::delete();
	}

	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->content);
	}

	/**
	 * Get the post's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the post's comments.
	 *
	 * @return array
	 */
	public function comments()
	{
		return $this->hasMany('Comment');
	}

    /**
     * Get the date the post was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

	/**
	 * Get the URL to the post.
	 *
	 * @return string
	 */
	public function url()
	{
		return Url::to($this->slug);
	}

	/**
	 * Returns the date of the blog post creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the blog post last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}
}